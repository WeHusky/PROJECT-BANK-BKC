<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerLoanController extends Controller
{
    /**
     * Display the customer loan page.
     */
    public function showCustomerLoan()
    {
        return view('perbankan.loan_site.custloan');
    }
    public function showCustomerLoanApplication()
    {
        return view('perbankan.loan_site.custloan-app');
    }
    public function showCustomerLoanApplication2()
    {
        return view('perbankan.loan_site.custloan-app2');
    }
}

