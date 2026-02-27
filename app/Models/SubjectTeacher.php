<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Subject; // Ensure this line is present and correct

class SubjectTeacher extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subject_teacher';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'teacher_id',
        'section_id',
        'schedule',
        'room',
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get the subject being taught.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher (User) handling this subject.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the specific section this subject-teacher assignment belongs to.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}