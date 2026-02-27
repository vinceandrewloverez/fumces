<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'admission_id',
        'studentFullName',
        'birth_certificate_path',
        'report_card_path',
        'applicant_photo_path',
        'father_photo_path',
        'mother_photo_path',
        'guardian_photo_path',
        'birth_cert_status',
        'report_card_status',
        'applicant_photo_status',
        'father_photo_status',
        'mother_photo_status',
        'guardian_photo_status',
    ];

    // Relationship
    public function admission()
    {
        // Make sure 'admission_id' matches the column name in your 'documents' table
        // and 'id' matches the primary key in your 'admissions' table
        return $this->belongsTo(Admission::class, 'admission_id', 'id');
    }
// In Document.php model
public function getStudentFullNameAttribute($value)
{
    // If the SQL alias failed or is empty, try to get it from the relationship
    if (empty($value) && $this->admission) {
        $mid = $this->admission->studentMiddleName;
        $initial = $mid ? strtoupper(substr($mid, 0, 1)) . '. ' : '';
        return "{$this->admission->studentFirstName} {$initial}{$this->admission->studentLastName}";
    }
    return $value;
}
}