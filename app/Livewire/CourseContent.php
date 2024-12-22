<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseContent extends Component
{
    public $course; 
    public $chapters = []; 

    public function mount($course)
    {
        // Store the chapters and lessons
        $this->chapters = $course->chapters;
    }

    public function render()
    {
        return view('livewire.components.course-content', [
            'chapters' => $this->chapters,
        ]);
    }
}
