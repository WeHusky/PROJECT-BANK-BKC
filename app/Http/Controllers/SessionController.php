<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Simpan data ke session
    public function create(Request $request)
    {
        // Misal request punya field name
        Session::put('name', $request->name);
        return redirect()->back()->with('success', 'Session name berhasil disimpan!');
    }

    // Tampilkan data dari session
    public function show()
    {
        $name = Session::get('name');
        return view('session.show', compact('name'));
    }

    // Hapus data session
    public function destroy()
    {
        Session::forget('name');
        return redirect()->back()->with('success', 'Session name berhasil dihapus!');
    }
}
