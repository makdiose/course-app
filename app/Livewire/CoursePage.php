<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

#[Layout('livewire.layouts.app')] // Use the main layout
class CoursePage extends Component
{
 
    public function render()
    {
        return view('livewire.course-page');
    }
}
