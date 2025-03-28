<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('layout'); })->name('home');

Route::get('/login/student', function () {return view('studentPage.login');})->name('loginStudent');
Route::get('/login/teacher', function () {return view('teacherPage.login');})->name('loginTeacher');
Route::get('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::get('/teacher/login', [TeacherController::class, 'login'])->name('teacher.login');

Route::get('student/marks', [StudentController::class, 'marks'])->name('student.marks');
Route::get('group/subjects', [GroupController::class, 'getSubjects'])->name('group.subjects');
Route::get('group/avg', [GroupController::class, 'avg'])->name('group.avg');

Route::get('teacher/groups', [TeacherController::class, 'getGroups'])->name('teacher.groups');
Route::get('group/groupMarks', [GroupController::class, 'getMarks'])->name('group.marks');
Route::put('marks/update', [MarkController::class, 'update'])->name('marks.update');
Route::post('marks/add', [MarkController::class, 'add'])->name('marks.add');
Route::delete('marks/delete', [MarkController::class, 'delete'])->name('marks.delete');
Route::put('groups/update', [GroupController::class, 'update'])->name('groups.update');
Route::post('student/add', [GroupController::class, 'add'])->name('student.add');
