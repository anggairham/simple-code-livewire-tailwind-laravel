<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Livewire\Auth\Login;
use App\Livewire\ClassLivewire;
use App\Livewire\StudentLivewire;
use App\Livewire\TeacherLivewire;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function(){
    //login
    Route::get('/', Login::class);
    Route::get('/login', Login::class)->name('auth.login');
    
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/student', StudentLivewire::class)->name('student');
    Route::get('/teacher', TeacherLivewire::class)->name('teacher');
    Route::get('/class', ClassLivewire::class)->name('class');
});


// Route::get('/student', function () {
//     return view('students.index');
// });
// Route::get('/teacher', function () {
//     return view('teachers.index');
// });
// Route::get('/class', function () {
//     return view('classes.index');
// });

// Route::resource('students', StudentController::class);
// Route::resource('teachers', TeacherController::class);
// Route::resource('classes', ClassController::class);
