<?php
namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NasabahController extends Controller{
    public function showLandingPage()
    {
        return view('auth.landing');
    }
    public function showHomePage()
    {
        $user = Auth::guard('nasabah')->user();
        if (!$user) {
            // Redirect ke login atau tampilkan pesan error
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $nasabah = Nasabah::where('id_akun', $user->id_akun)->first();
        return view('menu.homepage', compact('nasabah'));
    }
    public function showAccountPage()
    {
        $user = Auth::guard('nasabah')->user();
        $nasabah = Nasabah::where('id_akun', $user->id_akun)->first();
        return view('menu.account', compact('nasabah'));
    }
    public function showAccountSettingsPage()
    {
        $user = Auth::guard('nasabah')->user();
        $nasabah = Nasabah::where('id_akun', $user->id_akun)->first();
        return view('menu.account-settings', compact('nasabah'));
    }
    public function showNotificationsPage()
    {
        $user = Auth::guard('nasabah')->user();
        $nasabah = Nasabah::where('id_akun', $user->id_akun)->first();
        return view('menu.notification', compact('nasabah'));
    }

    public function update(Request $request, $id): RedirectResponse
{
    $nasabah = Nasabah::findOrFail($id);

    $nasabah->update([
        'alamat_nasabah' => $request->alamat_nasabah,
        'gender_nasabah' => $request->gender_nasabah,
        'statuskawin_nasabah' => $request->statuskawin_nasabah,
        'nohp_nasabah' => $request->nohp_nasabah,
        'pekerjaan_nasabah' => $request->pekerjaan_nasabah,
        'penghasilan_nasabah' => $request->penghasilan_nasabah,
        'tanggungan_nasabah' => $request->tanggungan_nasabah,
        'nama_nasabah' => $request->nama_nasabah,

    ]);

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');

}

}
?>
