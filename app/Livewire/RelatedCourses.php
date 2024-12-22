<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class RelatedCourses extends Component
{
    public $course; // The current course ID
    public $relatedCourses = []; // To store related courses

    public function mount($course)
    {
        // Fetch related courses based on shared categories
        $this->relatedCourses = Course::whereHas('categories', function ($query) use ($course) {
            $query->whereIn('categories.id', $course->categories->pluck('id'));
        })
        ->where('courses.id', '!=', $course->id)
        ->limit(4)
        ->get();
    }

    public function render()
    {
        return view('livewire.components.related-courses', [
            'relatedCourses' => $this->relatedCourses,
        ]);
    }
}
