<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display the cashier dashboard.
     */
    public function index()
    {
        return view('cashier.index'); 
        // Ensure you have a file at resources/views/cashier/index.blade.php
    }

    /**
     * Handle a specific cashier action.
     */
    public function store(Request $request)
    {
        // Your logic here
        return back()->with('success', 'Transaction completed.');
    }
}