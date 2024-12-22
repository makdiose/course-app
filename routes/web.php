<?php

use App\Livewire\HomePage;
use App\Http\Controllers\CoursesController;

Route::get('/', HomePage::class)->name('home');

use App\Livewire\ProfilePage;

Route::get('/profile', ProfilePage::class)->name('profile');

use App\Livewire\CoursePage;

Route::get('/courses/{slug}', CoursePage::class)->name('course.show');


require __DIR__.'/auth.php';
