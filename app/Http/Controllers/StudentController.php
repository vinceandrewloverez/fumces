<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function index(): View
    {
        // This looks for resources/views/student/index.blade.php
        return view('student.index'); 
    }
}