<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Pengajuan_Kredit;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CustomerLoanController extends Controller
{
    /**
     * Display the customer loan page.
     */
    public function showCustomerLoansMenu()
    {
        return view('perbankan.loan_site.custloan');
    }
    public function showCustomerLoanApplication()
    {
        $loggedInAkun = Auth::guard('nasabah')->user();
        $nasabahData = Nasabah::where('id_akun', $loggedInAkun->id_akun)->first();
        $historyPengajuan = Pengajuan_Kredit::where('id_nasabah', $nasabahData->id_nasabah)
            ->orderBy('tanggal_pengajuankredit', 'desc')
            ->get();

        return view('perbankan.loan_site.custloan-app', compact('nasabahData', 'historyPengajuan'));
    }
    public function submitLoan(Request $request){
        $loggedInAkun = Auth::guard('nasabah')->user();
        $request->validate([
            'nominal_pengajuankredit' => ['required', 'numeric', 'min:1000000', 'max:250000000'],
            'tenor' => ['required', 'integer', 'min:2', 'max:18'],
            'rekening_nasabah' => ['required'],
        ]);
        if($request->nominal_pengajuankredit > 25000000){
            $kategori_pengajuankredit = 'Kewenangan Peminjaman Pusat';
        } else {
            $kategori_pengajuankredit = 'Kewenangan Peminjaman Cabang';
        }

        $pengajuan_kredit = Pengajuan_Kredit::create([
            'nominal_pengajuankredit' => $request->nominal_pengajuankredit,
            'tenor' => $request->tenor,
            'id_nasabah' => Auth::guard('nasabah')->user()->nasabah->id_nasabah,
            'tanggal_pengajuankredit' => now(),
            'kategori_pengajuankredit' => $kategori_pengajuankredit,
            'status_pengajuankredit' => 'Under Review',
            'konfirmasi_pengajuankredit' => '0',
            'status_kelayakan' => '0',
            'rekening_nasabah' => $request->rekening_nasabah,
        ]);

        $survei = Survei::create([
            'id_pengajuankredit' => $pengajuan_kredit->id_pengajuankredit,
        ]);

        $notifikasi = Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'Your loan application has been submitted successfully and is now under review.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $pengajuan_kredit->id_pengajuankredit]),
            'id_akun' => $loggedInAkun->id_akun,
            'status_notifikasi' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('nasabah.custloan-sukses');
    }
    public function showCustomerLoanSuccess()
    {
        return view('perbankan.loan_site.custloan-sukses');
    }
    public function showCustomerLoans()
    {
        $loggedInAkun = Auth::guard('nasabah')->user();
        $pengajuan_kredit = Pengajuan_Kredit::where('id_nasabah', $loggedInAkun->nasabah->id_nasabah)->get();
        return view('perbankan.loan_site.myloans', compact('pengajuan_kredit'));
    }
    public function showCustomerLoan($id)
    {
        $nasabah = Auth::guard('nasabah')->user()->nasabah->id_nasabah;
        $pengajuan_kredit = Pengajuan_Kredit::where('id_pengajuankredit', $id)->first();
        $survei = Survei::where('id_pengajuankredit', $id)->first();
        return view('perbankan.loan_site.loan', compact('pengajuan_kredit','nasabah', 'survei'));
    }
    public function showCustomerSurveyResult($id)
    {
        $pengajuan_kredit = Pengajuan_Kredit::where('id_pengajuankredit', $id)->first();
        $survei = Survei::where('id_pengajuankredit', $id)->first();
        return view('perbankan.loan_site.surveyresult', compact('survei','pengajuan_kredit'));
    }
    public function surveyDateConfirmation($id, Request $request)
    {
        $request->validate([
            'tanggal_survei' => ['required', 'date'],
        ]);

        $pengajuan_kredit = Pengajuan_Kredit::where('id_pengajuankredit', $id)->first();
        $pengajuan_kredit->status_pengajuankredit = 'Survey Scheduled';
        $pengajuan_kredit->save();

        $survei = Survei::where('id_pengajuankredit', $id)->first();
        $survei->tanggal_survei = $request->tanggal_survei;
        $survei->save();

        $notification = Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'Your survey date has been successfully confirmed. Please be prepared for the survey on the scheduled date. Our team will contact you if further information is needed.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $pengajuan_kredit->id_pengajuankredit]),
            'id_akun' => Auth::guard('nasabah')->user()->id_akun,
            'status_notifikasi' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Tanggal survei berhasil dikonfirmasi.');
    }

    public function cancelLoan($id)
    {
        $pengajuan_kredit = Pengajuan_Kredit::findOrFail($id);
        // Optional: cek apakah loan milik user yang login
        $pengajuan_kredit->status_pengajuankredit = 'Loan Cancelled';
        $pengajuan_kredit->save();

        // Optional: tambahkan notifikasi pembatalan
        $notification = Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'Your loan application has been cancelled as per your request. If this was a mistake or you need further assistance, please contact our support team.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $pengajuan_kredit->id_pengajuankredit]),
            'id_akun' => Auth::guard('nasabah')->user()->id_akun,
            'status_notifikasi' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('nasabah.myloans')->with('success', 'Loan application cancelled.');
    }

    public function confirmDisbursement($id)
    {
        $pengajuan_kredit = Pengajuan_Kredit::findOrFail($id);
        // Optional: cek apakah loan milik user yang login
        $pengajuan_kredit->status_pengajuankredit = 'Loan Disbursed';
        $pengajuan_kredit->save();

        // Optional: tambahkan notifikasi konfirmasi pencairan
        $notification = Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'Your loan has been successfully disbursed. Please check your account for the funds.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $pengajuan_kredit->id_pengajuankredit]),
            'id_akun' => Auth::guard('nasabah')->user()->id_akun,
            'status_notifikasi' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $nasabah = Nasabah::findOrFail($pengajuan_kredit->id_nasabah);
        $nasabah->saldo_nasabah += $pengajuan_kredit->nominal_pengajuankredit;
        $nasabah->save();

        return redirect()->route('nasabah.loan', ['id' => $id])->with('success', 'Loan disbursement confirmed.');
    }
}

