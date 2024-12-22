<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'title'; // Default sorting field
    public $sortDirection = 'asc'; // Default sorting direction
    public $filterCategory = null;
    public $filterLevel = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'title'],
        'sortDirection' => ['except' => 'asc'],
        'filterCategory' => ['except' => null],
        'filterLevel' => ['except' => null],
    ];
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
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

    public function clearFilters()
    {
        $this->reset(['search', 'filterCategory', 'filterLevel','sortField','sortDirection']);
        $this->resetPage();

        $this->dispatch('refreshComponent');
    }
    
    

    public function render()
    {
        $courses = Course::with(['categories', 'chapters.lessons']) 
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterCategory, function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('name', $this->filterCategory);
                });
            })
            ->when($this->filterLevel, function ($query) {
                $query->where('level', $this->filterLevel);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        
        // Fetch all categories for the filter dropdown
        $categories = Category::all(); 

        return view('livewire.components.courses-table', compact('courses', 'categories'));
    }

}