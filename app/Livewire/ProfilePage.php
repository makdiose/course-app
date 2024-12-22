<?php

namespace App\Livewire;

use Livewire\Component;

#[Layout('livewire.layouts.app')]
class ProfilePage extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.pages.profile-page');
    }
}
