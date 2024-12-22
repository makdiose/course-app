<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'title', 'duration'];

    /**
     * The chapter the lesson belongs to.
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    /**
     * Get the formatted duration of the lesson.
     *
     * @return string
     */
    public function getFormattedDurationAttribute()
    {
        $formatted_duration = readableDuration($this->duration);
        return $formatted_duration;
    }
}
