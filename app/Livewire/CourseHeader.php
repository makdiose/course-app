<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseHeader extends Component
{
    public $courseId;
    public $course;

    public function mount($course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.components.course-header', [
            'course' => $this->course,
        ]);
    }
}
