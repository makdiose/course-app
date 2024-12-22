<?php

namespace App\Livewire;

use Livewire\Component;

#[Layout('livewire.layouts.app')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page');
    }
}
