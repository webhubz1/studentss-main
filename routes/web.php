<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/', [HomeController::class, 'index']);  
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('/export-students', [StudentController::class, 'export'])->name('export.students');


Route::get('/students/program/{program}', [StudentController::class, 'studentsByProgram'])->name('students.program');
});

Route::get('/students/export/{school_year}/{program}', function ($school_year, $program) {
    return Excel::download(new StudentsExport($school_year, $program), 'students.xlsx');
})->name('students.export');

Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');

Route::get('student/{id}', [StudentController::class, 'show'])->name('view.student');
Route::get('students/{id}', [StudentController::class, 'show'])->name('student.show');

Route::get('/admin/students/{id}', [StudentController::class, 'showStudentProfile'])->name('students.show');


Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');    

Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('admin/view-student', [StudentController::class, 'index'])->name('admin.View-Student.index');    


