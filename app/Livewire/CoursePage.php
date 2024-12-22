<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

#[Layout('livewire.layouts.app')]
class CoursePage extends Component
{
    public $course;
    public $relatedCourses;
    public function mount($slug)
    {
        $this->course = Course::with(['categories', 'chapters.lessons'])->where('slug', $slug)->firstOrFail();
    }

    public function toggleFavorite($courseId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $course = Course::find($courseId);
        if ($course) {
            auth()->user()->favorites()->toggle($courseId);
        }
    }

    public function render()
    {
        return view('livewire.course-page', [
            'course' => $this->course
        ]);
    }
}
