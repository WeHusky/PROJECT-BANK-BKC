<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function regions()
    {
        // Logic to retrieve regions or any other data
        return view('regions.index'); // Adjust the view as necessary
    }

}


