<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'level', 'duration','slug'];

    /**
     * Categories a course belongs to.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_category');
    }

    /**
     * Chapters within a course.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    /**
     * Users who favorited this course.
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_courses');
    }


    /**
     * Get the total duration of all lessons in the course.
     */
    public function getTotalDurationAttribute()
    {
        // Sum the duration of all lessons associated with this course
        return $this->chapters->flatMap->lessons->sum('duration');
    }
}

