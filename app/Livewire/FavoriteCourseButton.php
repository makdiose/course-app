<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class FavoriteCourseButton extends Component
{
    public $courseId; // The ID of the course
    public $isFavorite = false; // Tracks whether the course is a favorite

    public function mount($course)
    {
        $this->courseId = $course->id;
        if (auth()->check()) {
            $this->isFavorite = auth()->user()->favorites->contains($this->courseId);
        }
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        auth()->user()->favorites()->toggle($this->courseId);
        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.components.favorite-course-button', [
            'isFavorite' => $this->isFavorite,
        ]);
    }
}
