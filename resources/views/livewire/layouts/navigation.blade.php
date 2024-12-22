<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="bg-white border-b border-gray-200 py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <!-- Left side (Brand + Nav Links) -->
        <div class="flex items-center space-x-8">
            <!-- Brand Name -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
            Portal
            </a>

            <!-- Nav Links -->
            <div class="flex space-x-4"> 
                <a wire:navigate href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                   Courses
                </a>
            
            </div>
        </div>

        <!-- Right side (User) -->
        <div>
            @auth
                <span class="hidden md:inline mr-4">Hi, {{ auth()->user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-gray-900 font-medium underline">
                        Logout
                    </button>
                </form>
            @else
                <a wire:navigate href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    Login
                </a>
                <span class="mx-2 text-black-500">/</span>
                <a wire:navigate href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>


