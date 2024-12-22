<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteCourse extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id'];

    /**
     * The user who favorited the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The course that is favorited.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
