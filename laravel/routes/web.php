<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login/student', function () {return view('studentPage.login');})->name('loginStudent');
Route::get('/login/teacher', function () {return view('teacherPage.login');})->name('loginTeacher');
Route::get('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::get('/teacher/login', [TeacherController::class, 'login'])->name('teacher.login');
