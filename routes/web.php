<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\TodoList;
use App\Livewire\Login;
use App\Livewire\Profile\UpdateProfile;

use App\Livewire\RegisterUser;
Route::get('/', TodoList::class)->name('todo-list');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/login', Login::class)->name('login');
// Route::get('/register', RegisterUser::class)->name('register');

// Protect the To-Do List and Update Profile routes with the 'auth' middleware
Route::middleware('auth')->group(function () {
   
    Route::get('/update-profile', UpdateProfile::class)->name('update-profile');
});



