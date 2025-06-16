<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
        $isAdminLogin = $request->is('admin/login');
        $guard = $isAdminLogin ? 'admin' : 'nasabah';
        $redirectRouteName = $isAdminLogin ? 'dashboard' : 'nasabah.homepage';
        $error_message = $isAdminLogin ?
            'Email atau password Admin yang Anda masukkan salah, atau akun Anda bukan Admin.' :
            'Email atau password Nasabah yang Anda masukkan salah, atau akun Anda bukan Nasabah.';

        // 2. Siapkan Credentials
        $credentials = [
            'email_akun' => $validatedData['email_akun'],
            'password' => $validatedData['password_akun'],
            'jenis_akun' => $isAdminLogin ? 'Admin' : 'Nasabah',
        ];

        // 3. Attempt Login
        if (Auth::guard($guard)->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route($redirectRouteName));
        }

        // 4. If login fails
        throw ValidationException::withMessages([
            'email_akun' => $error_message,
        ]);
    }

    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $guardToLogout = null;
        $redirectRouteName = '/';

        if (Auth::guard('admin')->check()) {
            $guardToLogout = 'admin';
            $redirectRouteName = 'admin.login';
        } elseif (Auth::guard('nasabah')->check()) {
            $guardToLogout = 'nasabah';
            $redirectRouteName = 'nasabah.landingpage';
        }

        if ($guardToLogout) {
            Auth::guard($guardToLogout)->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route($redirectRouteName)->with('logged_out', true);
    }
}
