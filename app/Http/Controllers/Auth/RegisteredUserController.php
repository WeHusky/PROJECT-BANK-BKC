<?php

namespace App\Http\Controllers\Auth;

use App\Models\Nasabah;
use App\Models\EmailVerification;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Models\Akun; // <-- GANTI DARI App\Models\User KE App\Models\Akun

class RegisteredUserController extends Controller
{
    /**
     * Generate a random account number
     */
    private function generateAccountNumber(): string
    {
        do {
            // Generate a 16-digit account number
            $accountNumber = '';
            for ($i = 0; $i < 16; $i++) {
                $accountNumber .= mt_rand(0, 9);
            }

            // Format the account number with spaces every 5 digits
            $accountNumber = implode(' ', str_split($accountNumber, 4));

        } while (Nasabah::where('rekening_nasabah', $accountNumber)->exists());

        return $accountNumber;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.nasabah-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            //tabel akun
            'username_akun' => ['required', 'string', 'max:255', 'unique:'.Akun::class.',username_akun'],
            'email_akun' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Akun::class.',email_akun'],
            'password_akun' => ['required', 'confirmed', Rules\Password::defaults()],
            'tanggal_survei' => ['nullable', 'date'],

            //tabel nasabah
            'nik_nasabah' => ['required', 'string', 'min:16', 'max:16', 'unique:nasabah,nik_nasabah'], 
            'tanggallahir_nasabah' => ['required', 'date'],
            'gender_nasabah' => ['required', 'string', 'in:Male,Female'],
            'pekerjaan_nasabah' => ['required', 'string', 'max:255'],
            'penghasilan_nasabah' => ['required', 'string', 'max:50'],
            'statuskawin_nasabah' => ['required', 'string', 'max:50'],
            'tanggungan_nasabah' => ['required', 'integer', 'min:0'],
            'kecamatan_nasabah' => ['required', 'string', 'max:50'],
            'alamat_nasabah' => ['required', 'string', 'max:500'],
            'nohp_nasabah' => ['required', 'string', 'min:10', 'max:13', 'unique:nasabah,nohp_nasabah'], 
        ]);

        // Generate OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP in database
        EmailVerification::create([
            'email' => $request->email_akun,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
            'verified' => false
        ]);

        // Send OTP email
        Mail::to($request->email_akun)->send(new OtpVerification($otp));

        // Store registration data in session
        session([
            'registration_data' => $request->all(),
            'account_number' => $this->generateAccountNumber()
        ]);

        return redirect()->route('nasabah.verify-email');
    }

    public function showVerificationForm()
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('nasabah.register');
        }
        return view('auth.verify-email');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6']
        ]);

        $verification = EmailVerification::where('email', session('registration_data.email_akun'))
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->where('verified', false)
            ->first();

        if (!$verification) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Mark as verified
        $verification->update(['verified' => true]);

        // Create account
        $akun = Akun::create([
            'username_akun' => session('registration_data.username_akun'),
            'email_akun' => strtolower(session('registration_data.email_akun')),
            'password_akun' => Hash::make(session('registration_data.password_akun')),
            'jenis_akun' => 'Nasabah',
        ]);

        $nasabah = Nasabah::create([
            'id_akun' => $akun->id_akun,
            'nik_nasabah' => session('registration_data.nik_nasabah'),
            'nama_nasabah' => session('registration_data.nama_nasabah'),
            'rekening_nasabah' => session('account_number'),
            'tanggallahir_nasabah' => session('registration_data.tanggallahir_nasabah'),
            'gender_nasabah' => session('registration_data.gender_nasabah'),
            'pekerjaan_nasabah' => session('registration_data.pekerjaan_nasabah'),
            'penghasilan_nasabah' => session('registration_data.penghasilan_nasabah'),
            'statuskawin_nasabah' => session('registration_data.statuskawin_nasabah'),
            'tanggungan_nasabah' => session('registration_data.tanggungan_nasabah'),
            'kecamatan_nasabah' => session('registration_data.kecamatan_nasabah'),
            'alamat_nasabah' => session('registration_data.alamat_nasabah'),
            'nohp_nasabah' => session('registration_data.nohp_nasabah'),
        ]);
        Auth::logout();
        event(new Registered($akun));
        Auth::guard('nasabah')->login($akun); 

        return redirect()->route('nasabah.introduction');
    }
}
