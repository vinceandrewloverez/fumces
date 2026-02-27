<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'code',          // e.g. MATH101
        'name',          // e.g. Mathematics
        'description',
        'grade_level',   // grade1, grade2, grade7, etc
        'units',         // optional if SHS/College
        'status'         // active, inactive
    ];

    protected $casts = [
        'units' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // If a subject can have many sections
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // If many teachers can teach many subjects
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    // If subject belongs to many enrollments or students
    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class);
    }
}