<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('perbankan.loan_site.custloan-app');
    }
    public function showCustomerLoanApplication2()
    {
        return view('perbankan.loan_site.custloan-app2');
    }
    public function showCustomerLoanSuccess()
    {
        return view('perbankan.loan_site.custloan-sukses');
    }
    public function showCustomerLoans()
    {
        return view('perbankan.loan_site.myloans');
    }
    public function showCustomerLoan()
    {
        return view('perbankan.loan_site.loan');
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

