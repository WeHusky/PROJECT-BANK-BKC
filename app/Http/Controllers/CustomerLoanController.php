<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pengajuan_Kredit;
use Illuminate\Http\Request;
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
        $nasabahData = null;
        $loggedInAkun = Auth::guard('nasabah')->user();
        $nasabahData = Nasabah::where('id_akun', $loggedInAkun->id_akun)->first();

        return view('perbankan.loan_site.custloan-app', compact('nasabahData'));
    }
    public function submitLoan(Request $request){
        $request->validate([
            'nominal_pengajuankredit' => ['required', 'numeric', 'min:1000000', 'max:250000000'],
            'tenor' => ['required', 'integer', 'min:2', 'max:18'],
        ]);
        if($request->nominal_pengajuan < 250000000){
            $kategori_pengajuankredit = 'Kewenangan Peminjaman Cabang';
        } else {
            $kategori_pengajuankredit = 'Kewenangan Peminjaman Pusat';
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
        $pengajuan_kredit = Pengajuan_Kredit::where('id_pengajuankredit', $id)->first();
        return view('perbankan.loan_site.loan', compact('pengajuan_kredit'));
    }
    #ntar apus aja ini cuman buat template ntar kalo backendnya dah jadi
    public function showCustomerLoan2()
    {
        return view('perbankan.loan_site.loan2');
    }
    public function showCustomerLoan3()
    {
        return view('perbankan.loan_site.loan3');
    }
    public function showCustomerLoan4()
    {
        return view('perbankan.loan_site.loan4');
    }
    public function showCustomerSurveyResult()
    {
        return view('perbankan.loan_site.surveyresult');
    }
    #end

}

