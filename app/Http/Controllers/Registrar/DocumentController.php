<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
public function index()
{
    // Just fetch. The Model logic below will handle the name automatically.
    $documents = Document::with('admission')->get();
    return view('registrar.documents.index', compact('documents'));
}    
    
    public function approve(Request $request)
    {
        $request->validate([
            'admission_id' => 'required',
            'document_type' => 'required'
        ]);

        $columnMap = [
            'birth_cert'  => 'birth_cert_status',
            'report_card' => 'report_card_status',
            'app_photo'   => 'applicant_photo_status',
            'fa_photo'    => 'father_photo_status',
            'mo_photo'    => 'mother_photo_status',
            'gu_photo'    => 'guardian_photo_status',
        ];

        $column = $columnMap[$request->document_type] ?? null;

        if (!$column) {
            return response()->json(['success' => false, 'message' => 'Invalid type.']);
        }

        // Use update directly on the query to be fast and safe
        $affected = Document::where('admission_id', $request->admission_id)
                    ->update([$column => 'approved']);

        if ($affected) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Database update failed.']);
    }

    
}