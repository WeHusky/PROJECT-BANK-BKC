<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
        return view('perbankan.loan_site.loans'); // Adjust the view path as necessary
    }
      /**
     * Display the specified loan details.
     */
    public function show($id)
    {
        return view('perbankan.loan_site.customer_details'); // Adjust the view path as necessary
    }


}
