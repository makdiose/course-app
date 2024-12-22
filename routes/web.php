<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\CoursePage;
use App\Livewire\ProfilePage;

Route::get('/', HomePage::class)->name('home');
Route::get('/profile', ProfilePage::class)->name('profile');
Route::get('/courses/{slug}', CoursePage::class)->name('course.show');

require __DIR__.'/auth.php';
