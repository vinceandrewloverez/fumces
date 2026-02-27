<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Get all sections belonging to this school year.
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Get all enrollment records for this school year.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Scope a query to only include the currently active school year.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}