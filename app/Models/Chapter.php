<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title'];

    /**
     * The course the chapter belongs to.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Lessons under this chapter.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
