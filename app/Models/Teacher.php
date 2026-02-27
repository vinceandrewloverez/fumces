<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject; // Import the Subject class

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'address',
        'employee_id',
        'status',        // active, inactive
        'hire_date'
    ];

    protected $casts = [
        'hire_date' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getFullNameAttribute()
    {
        return trim(
            $this->first_name . ' ' .
            ($this->middle_name ? $this->middle_name . ' ' : '') .
            $this->last_name
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // If teacher handles many sections
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // If teacher handles many subjects (optional)
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    // If teacher is also linked to users table (optional login)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}