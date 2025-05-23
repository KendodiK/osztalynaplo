<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/login/student', function () {return view('studentPage.login');})->name('loginStudent');
Route::get('/login/teacher', function () {return view('teacherPage.login');})->name('loginTeacher');
Route::get('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::get('/teacher/login/', [TeacherController::class, 'login'])->name('teacher.login');

Route::get('/login/student/marks', [MarkController::class, 'show'])->name('student.marks');
Route::get('group/subjects', [MarkController::class, 'showGroupMarks'])->name('mark.subjects');

Route::get('teacher/groups', [TeacherController::class, 'getGroups'])->name('teacher.groups');
Route::get('group/groupMarks', [GroupController::class, 'getMarks'])->name('group.marks');
Route::patch('marks/update/{id}', [MarkController::class, 'update'])->name('marks.update');
Route::get('teacher/login/{found}',  [TeacherController::class, 'login'])->name('teacher.site');
Route::post('marks/add', [MarkController::class, 'add'])->name('marks.add');
Route::get('marks/give', [MarkController::class, 'create'])->name('marks.give');
Route::delete('marks/delete', [MarkController::class, 'delete'])->name('marks.delete');
Route::put('groups/update', [GroupController::class, 'update'])->name('groups.update');

Route::get('teacher/{marksId}/edit', [MarkController::class, 'edit'])->name('marks.edit');
Route::get('student/{subject}/{studentId}/add', [MarkController::class, 'addMark'])->name('student.addMark');
Route::get('groups/{groupId}/{subjectId}/all', [StudentController::class, 'showAllByGroupId']);

Route::get('teacher/student', [StudentController::class, 'getStudentByTeacher'])->name('student.getByTeacher');
