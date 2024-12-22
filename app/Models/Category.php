<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];

    /**
     * Courses under this category.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_category');
    }
}
