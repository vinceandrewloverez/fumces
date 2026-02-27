<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year_id',
        'name',
        'grade_level',
    ];

    /**
     * Get the school year that owns the section.
     */
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    /**
     * Get the enrollments for the section.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Get the students enrolled in this section through the Enrollment model.
     */
    public function students()
    {
        return $this->hasManyThrough(
            Student::class,
            Enrollment::class,
            'section_id', // Foreign key on enrollments table
            'id',         // Foreign key on students table
            'id',         // Local key on sections table
            'student_id'  // Local key on enrollments table
        );
    }

    /**
     * Get the subjects and teachers assigned to this section.
     */
    public function subjectAssignments()
    {
        return $this->hasMany(SubjectTeacher::class, 'section_id');
    }
}