<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    public function index()
    {
        // Logic to fetch tuition information for the student
        return view('student.tuitions.index');
    }
}