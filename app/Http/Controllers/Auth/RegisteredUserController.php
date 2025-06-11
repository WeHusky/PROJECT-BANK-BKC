<?php

namespace App\Http\Controllers\Auth;

use App\Models\Nasabah;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Models\Akun; // <-- GANTI DARI App\Models\User KE App\Models\Akun

class RegisteredUserController extends Controller
{
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
            'nik_nasabah' => ['required', 'string', 'max:20', 'unique:nasabah,nik_nasabah'], 
            'tanggallahir_nasabah' => ['required', 'date'],
            'gender_nasabah' => ['required', 'string', 'in:male,female'],
            'pekerjaan_nasabah' => ['required', 'string', 'max:255'],
            'penghasilan_nasabah' => ['required', 'string', 'max:50'], 
            'statuskawin_nasabah' => ['required', 'string', 'max:50'],
            'tanggungan_nasabah' => ['required', 'integer', 'min:0'], 
            'alamat_nasabah' => ['required', 'string', 'max:500'],
            'nohp_nasabah' => ['required', 'string', 'max:20', 'unique:nasabah,nohp_nasabah'], 
        ]);

        // buat record akun
        $akun = Akun::create([ 
            'username_akun' => $request->username_akun, 
            'email_akun' => $request->email_akun,       
            'password_akun' => Hash::make($request->password_akun), 
            'jenis_akun' => 'Nasabah', 
        ]);

        // buat record nasabah
        $nasabah = Nasabah::create([
            'id_akun' => $akun->id_akun,
            'nik_nasabah' => $request->nik_nasabah,
            'nama_nasabah' => $request->nama_nasabah,
            'tanggallahir_nasabah' => $request->tanggallahir_nasabah,
            'gender_nasabah' => $request->gender_nasabah,
            'pekerjaan_nasabah' => $request->pekerjaan_nasabah,
            'penghasilan_nasabah' => $request->penghasilan_nasabah, 
            'statuskawin_nasabah' => $request->statuskawin_nasabah,
            'tanggungan_nasabah' => $request->tanggungan_nasabah,
            'alamat_nasabah' => $request->alamat_nasabah,
            'nohp_nasabah' => $request->nohp_nasabah,
        ]);

        event(new Registered($akun));

        Auth::guard('nasabah')->login($akun); 

        return redirect()->route('nasabah.homepage');
    }
}