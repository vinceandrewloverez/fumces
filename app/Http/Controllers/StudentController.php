<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch all admissions for this user
        $admissions = Admission::where('user_id', $user->id)->get();

        // Make sure the variable is always defined, even if empty
        return view('student.index', compact('admissions'));
    }









}