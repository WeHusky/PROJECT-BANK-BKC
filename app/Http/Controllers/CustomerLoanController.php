<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerLoanController extends Controller
{
    /**
     * Display the customer loan page.
     */
    public function index()
    {
        return view('perbankan.loan_site.custloan');
    }
}
