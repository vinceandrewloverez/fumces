<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        // 1. Fetch the main list
        $admissions = Admission::all();
    
        // 2. Calculate Totals
        // Adjust 'status' and the string values ('pending', 'enrolled') 
        // to match your actual database column and values.
        $pendingCount = Admission::where('status', 'pending')->count();
        $reviewCount = Admission::where('status', 'review')->count();
        $totalEnrolled = Admission::where('status', 'enrolled')->count();
        $totalApproved = Admission::where('status', 'approved')->count();
        $totalRejected = Admission::where('status', 'rejected')->count();
        

        // 3. Pass everything to the view
        return view('registrar.enrollment.index', compact(
            'admissions', 
            'pendingCount', 
            'reviewCount', 
            'totalEnrolled',
            'totalApproved',
            'totalRejected'
        ));
    }

    public function updateStatus(Request $request, $id)
{
    $admission = Admission::findOrFail($id);

    // Make sure the status is one of the allowed values
    $allowedStatuses = ['Pending', 'Approved', 'Rejected'];
    if (in_array($request->status, $allowedStatuses)) {
        $admission->status = $request->status;
        $admission->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    return redirect()->back()->with('error', 'Invalid status.');
}

}


