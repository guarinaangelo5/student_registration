<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class); 

Route::get('/students/{student}/profile', function (\App\Models\Student $student) {
    return view('students.profile', compact('student'));
})->name('students.profile');
