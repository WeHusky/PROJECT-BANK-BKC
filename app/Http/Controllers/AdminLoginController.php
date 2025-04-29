<?php
namespace App\Http\Controllers;

use App\Models\SessionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email_akun' => 'required',
            'password_akun' => 'required'
        ]);

        // Cari user admin berdasarkan username
        $admin = Akun::where('email_akun','like','%@bkcbank.com', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Kalau password cocok
            Session::put('id_akun', $admin->id);
            Session::put('username_akun', $admin->username);

            return redirect('/admin/dashboard')->with('success', 'Berhasil login!');
        } else {
            // Kalau login gagal
            return back()->withErrors([
                'login' => 'Username atau password salah'
            ])->withInput();
        }
    }

    // Logout
    public function logout()
    {
        Session::forget('id_admin');
        Session::forget('id_username');

        return redirect('/admin/login')->with('success', 'Berhasil logout');
    }

    // Tampilkan halaman admin login
    public function index()
    {
        $session = SessionModel::all();
        return view('admin.admin-login');
    }
}
?>