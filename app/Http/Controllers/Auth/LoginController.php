<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // <-- Pastikan ini di-import

class LoginController extends Controller
{
    /**
     * Show the login form for admin.
     *
     * @return \Illuminate\View\View
     */
    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * Show the login form for nasabah.
     *
     * @return \Illuminate\View\View
     */
    public function showNasabahLoginForm()
    {
        return view('auth.nasabah-login');
    }

    /**
     * Handle the login request for both admin and nasabah.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'email_akun' => ['required', 'email'],
            'password_akun' => ['required'],
        ]);

        $remember = $request->filled('remember');

        $guard = null;
        $redirectRouteName = null;
        $error_message = 'Email atau password yang Anda masukkan salah.';
        $credentials = []; // Inisialisasi array credentials di sini

        // 2. Tentukan Guard dan Siapkan Credentials berdasarkan URL yang diakses
        if ($request->is('admin/login')) {
            $guard = 'admin';
            $redirectRouteName = 'dashboard';
            $credentials = [
                'email_akun' => $validatedData['email_akun'],
                'password' => $validatedData['password_akun'],
                'jenis_akun' => 'Admin',
            ];
            $error_message = 'Email atau password Admin yang Anda masukkan salah, atau akun Anda bukan Admin.';
        } elseif ($request->is('login')) { // Ini adalah route untuk nasabah login
            $guard = 'nasabah';
            $redirectRouteName = 'nasabah.homepage';
            $credentials = [
                'email_akun' => $validatedData['email_akun'],
                'password' => $validatedData['password_akun'],
                'jenis_akun' => 'Nasabah',
            ];
            $error_message = 'Email atau password Nasabah yang Anda masukkan salah, atau akun Anda bukan Nasabah.';
        } else {
            // Jika request URL tidak cocok dengan rute login yang diharapkan
            throw ValidationException::withMessages([
                'email_akun' => 'Permintaan login tidak valid. Silakan coba lagi.',
            ]); // <-- Hapus .onlyInput('email_akun')
        }

        // 3. Lakukan Panggilan Auth::attempt() SATU KALI SAJA
        if (Auth::guard($guard)->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route($redirectRouteName));
        }

        // 4. Jika login gagal (Auth::attempt mengembalikan false)
        throw ValidationException::withMessages([
            'email_akun' => $error_message,
        ]); // <-- Hapus .onlyInput('email_akun')
    }

    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Tentukan guard mana yang sedang login dan perlu di-logout
        $guardToLogout = 'web'; // Default fallback guard
        $redirectRouteName = '/'; // Default redirect fallback

        if (Auth::guard('admin')->check()) {
            $guardToLogout = 'admin';
            $redirectRouteName = 'admin.login';
        } elseif (Auth::guard('nasabah')->check()) {
            $guardToLogout = 'nasabah';
            $redirectRouteName = 'nasabah.landingpage';
        } else {
            $guardToLogout = 'web';
            $redirectRouteName = '/';
        }

        Auth::guard($guardToLogout)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route($redirectRouteName)->with('logged_out', true);
    }
}