<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    /**
     * Display the admission form or current application status.
     */
    public function index()
    {
        // Guests see the form
        if (Auth::guest()) {
            return view('admissions');
        }

        // Get the logged-in user's admission (first record)
        $admission = Admission::where('user_id', Auth::id())->first();

        // If admission exists, show success-card
        if ($admission) {
            return view('success-card', ['admission' => $admission]);
        }

        // Logged-in users without submission
        return view('admissions');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studentFirstName' => 'required|string',
            'studentLastName'  => 'required|string',
            'dateOfBirth'      => 'required|date',
            'gender'           => 'required|string',
            'address'          => 'required|string',
            'emergencyName'    => 'required|string',
            'phone'            => 'required|string',
            'socioeconomic_status' => 'required',
            'housing_type'     => 'required',
            'year_level'       => 'required',
            'academic_year'    => 'required',
            'discount_intent'  => 'required|boolean',
            'birth_certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'report_card'       => 'required|file|mimes:pdf,jpg,png|max:2048',
            'applicant_photo'   => 'required|image|max:2048',
            'father_photo'      => 'required|image|max:2048',
            'mother_photo'      => 'required|image|max:2048',
            'guardian_photo'    => 'required|image|max:2048',
        ]);

        return DB::transaction(function () use ($request) {

            // Upload files
            $filePaths = [];
            $fileMapping = [
                'birth_certificate' => 'birth_certificate_path',
                'report_card'       => 'report_card_path',
                'applicant_photo'   => 'applicant_photo_path',
                'father_photo'      => 'father_photo_path',
                'mother_photo'      => 'mother_photo_path',
                'guardian_photo'    => 'guardian_photo_path',
            ];

            foreach ($fileMapping as $formKey => $dbColumn) {
                if ($request->hasFile($formKey)) {
                    $filePaths[$dbColumn] = $request->file($formKey)->store('admissions', 'public');
                }
            }

            // Prepare admission data
            $data = $request->except(array_merge(array_keys($fileMapping), ['_token']));
            $finalData = array_merge($data, $filePaths, [
                'user_id' => Auth::id(),
                'applicantNumber' => 'APP-' . strtoupper(uniqid()),
            ]);

            // Create admission
            $admission = Admission::create($finalData);

// Create ONE document record containing all paths
Document::create(array_merge($filePaths, [
    'user_id'      => $admission->user_id,
    'admission_id' => $admission->id,
    // The statuses default to 'pending' in your DB, 
    // so you don't strictly need to set them here.
]));
            return view('success-card', compact('admission'));
        });
    }

    // AdmissionController.php
    public function updateFiles(Request $request)
    {
        // Find the record for the logged-in user
        $admission = Admission::where('user_id', Auth::id())->firstOrFail();

        $fields = [
            'birth_certificate_path' => ['pdf'],
            'report_card_path' => ['pdf'],
            'applicant_photo_path' => ['png', 'jpg', 'jpeg'],
            'father_photo_path' => ['png', 'jpg', 'jpeg'],
            'mother_photo_path' => ['png', 'jpg', 'jpeg'],
            'guardian_photo_path' => ['png', 'jpg', 'jpeg']
        ];

        foreach ($fields as $field => $extensions) {
            if ($request->hasFile($field)) {
                // Delete old file if it exists to save space
                if ($admission->$field) {
                    Storage::disk('public')->delete($admission->$field);
                }

                // Store new file and update path
                $path = $request->file($field)->store('admissions', 'public');
                $admission->$field = $path;
            }
        }

        $admission->save();

        return redirect()->back()->with('success', 'Document updated successfully.');
    }

    // Approve admission
    public function approve($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->status = 'Approved';
        $admission->save();

        return redirect()->back()->with('success', 'Admission approved successfully.');
    }

    // Reject admission
    public function reject($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->status = 'Rejected';
        $admission->save();

        return redirect()->back()->with('error', 'Admission rejected.');
    }
    
}


