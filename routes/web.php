<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('Add-student', [StudentController::class, 'create'])->name('students.create');
    Route::post('Add-student', [StudentController::class, 'store'])->name('students.store');
    Route::get('View-Student', [StudentController::class, 'viewStudent'])->name('students.view');
Route::post('View-Student/search', [StudentController::class, 'searchStudent'])->name('students.search');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/create', [StudentController::class, 'create']);
Route::get('/enroll', [StudentController::class, 'create']);  // Display the form
Route::post('/enroll', [StudentController::class, 'store'])->name('enroll.store');    
Route::resource('students', StudentController::class);

});