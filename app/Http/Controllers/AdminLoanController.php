<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Pengajuan_Kredit;
use App\Models\Nasabah;

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
        $nasabah = $loan->nasabah;
        return view('perbankan.loan_site.customer_details', compact('loan', 'nasabah'));
    }



}
