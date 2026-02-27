<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {

        
        $user = Auth::user();

        // Get the student's admission record
        $admission = Admission::where('user_id', $user->id)->first();

        if (!$admission) {
            return back()->with('error', 'Admission record not found.');
        }

        // Create document row if not exists, INCLUDING admission_id
        $document = Document::firstOrCreate(
            [
                'user_id' => $user->id,
                'admission_id' => $admission->id
            ],
            [
                'applicant_photo_path' => null,
                'guardian_photo_path' => null,
                'mother_photo_path' => null,
                'father_photo_path' => null,
                'report_card_path' => null,
                'birth_certificate_path' => null,
            ]
        );

        $fields = [
            'applicant_photo_path',
            'guardian_photo_path',
            'mother_photo_path',
            'father_photo_path',
            'report_card_path',
            'birth_certificate_path'
        ];

        $done = 0;
        foreach ($fields as $field) {
            if (!empty($document->$field)) {
                $done++;
            }
        }

        $percentage = ($done / count($fields)) * 100;

        return view('student.documents.index', [
            'documents' => $document,
            'percentage' => $percentage,
            'doneCount' => $done
        ]);
    }

    public function update(Request $request, $id)
    {
        $document = Document::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $fileKey = $request->input('document_type');

        if (!$fileKey || !$request->hasFile($fileKey)) {
            return back()->with('error', 'No file was uploaded.');
        }

        $request->validate([
            $fileKey => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Delete old file if exists
        if ($document->$fileKey) {
            Storage::disk('public')->delete($document->$fileKey);
        }

        // Store file in admissions folder
        $path = $request->file($fileKey)->store('admissions', 'public');

        $document->$fileKey = $path;
        $document->save();

        return back()->with(
            'success',
            ucfirst(str_replace('_', ' ', $fileKey)) . ' updated successfully.'
        );
    }
}