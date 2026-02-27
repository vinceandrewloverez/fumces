<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentFirstName',
        'studentLastName',
        'dateOfBirth',
        'gender',
        'address',
        'emergencyName',
        'phone',
        'socioeconomic_status',
        'housing_type',
        'discount_intent',
        'year_level',
        'academic_year',
        'birth_certificate_path',
        'report_card_path',
        'applicant_photo_path',
        'father_photo_path',
        'mother_photo_path',
        'guardian_photo_path',
        'user_id',
        'applicantNumber', // ← add this
        // 'studentNumber', // keep for later when paid
    ];
}