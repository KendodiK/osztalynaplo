<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/login/student', function () {return view('studentPage.login');})->name('loginStudent');
Route::get('/login/teacher', function () {return view('teacherPage.login');})->name('loginTeacher');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::post('/teacher/login', [TeacherController::class, 'login'])->name('teacher.login');

Route::get('/login/student/marks', [MarkController::class, 'show'])->name('student.marks');
Route::get('group/subjects', [MarkController::class, 'showGroupMarks'])->name('mark.subjects');

Route::get('teacher/groups', [TeacherController::class, 'getGroups'])->name('teacher.groups');
Route::get('group/groupMarks', [GroupController::class, 'getMarks'])->name('group.marks');
Route::put('marks/update', [MarkController::class, 'update'])->name('marks.update');
Route::post('marks/add', [MarkController::class, 'add'])->name('marks.add');
Route::delete('marks/delete', [MarkController::class, 'delete'])->name('marks.delete');
Route::put('groups/update', [GroupController::class, 'update'])->name('groups.update');
//Route::post('student/add', [GroupController::class, 'add'])->name('student.add');

Route::get('groups/{groupId}/{subjectId}/all', [StudentController::class, 'showAllByGroupId']);
