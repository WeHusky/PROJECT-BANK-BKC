<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Pengajuan_Kredit;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

class AdminLoanController extends Controller
{
    /**
     * Display a listing of the loans.
     */
    public function index()
    {
        $loans = Pengajuan_Kredit::all();
        return view('perbankan.loan_site.loans', compact('loans'));
    }
      /**
     * Display the specified loan details.
     */
    public function show($id)
    {
        $loan = Pengajuan_Kredit::with('nasabah')->findOrFail($id);
        $survei = Survei::where('id_pengajuankredit', $loan->id_pengajuankredit)->first();
        $nasabah = $loan->nasabah;
        return view('perbankan.loan_site.customer_details', compact('loan', 'nasabah','survei'));
    }

    public function statusUpdate(Request $request, $id){
        $request->validate([
            'status_pengajuankredit' => ['required', 'string', 'in:Loan Approved,Loan Rejected,Under Review,Survey Scheduled,Survey Under Review,Awaiting Date Confirmation,'],
        ]);

        $loan = Pengajuan_Kredit::findOrFail($id);
        $loan->status_pengajuankredit = $request->status_pengajuankredit;
        $loan->save();

        $nasabah = $loan->nasabah;
        $akun = $nasabah->akun;
        $id_akun = $akun ? $akun->id_akun : null;

        if ($request->status_pengajuankredit === 'Awaiting Date Confirmation'){
            Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'We have received your loan application and are currently waiting for survey date confirmation. Please check your application details.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $id]),
            'id_akun' => $id_akun,
            ]);
        }
        elseif ($request->status_pengajuankredit === 'Survey Under Review'){
            Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'The survey for your loan application has been completed and is now under review by our team.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $id]),
            'id_akun' => $id_akun,
            ]);
        }
        elseif ($request->status_pengajuankredit === 'Loan Approved'){
            Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'Congratulations! Your loan application has been approved. Please check the application page for more information.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $id]),
            'id_akun' => $id_akun,
            ]);
        }
        elseif ($request->status_pengajuankredit === 'Loan Rejected'){
            Notifications::create([
            'jenis_notifikasi' => 'Loan',
            'deskripsi_notifikasi' => 'We are sorry, your loan application could not be approved at this time. Please check the details and contact us if you need assistance.',
            'link_notifikasi' => route('nasabah.loan', ['id' => $id]),
            'id_akun' => $id_akun,
            ]);
        }

        return redirect()->route('loans.show', ['id' => $id])->with('success', 'Loan status updated successfully.');    
    }
}
