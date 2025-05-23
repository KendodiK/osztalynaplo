<?php

namespace App\Http\Controllers;

use App\Models\ConnectSubjectsGroupTeacher;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public  function login()
    {
        $students = Student::all();
        $name = request('name');
        $student_code = request('code');
        foreach ($students as $student) {
            if ($student->name == $name && $student->student_code == $student_code) {
                Session::put('student', $student->toArray());
                //$marks = Mark::marksForStud($student->id);
            return redirect()->route('student.marks'/*,compact('student','marks')*/);
            }
        }
        return view('studentPage.login')->with('errors', 'Nincs a megadottaknak megfelelő diák');
    }

    public  function showAllByGroupId($group_id, $subject_id)
    {
        $classData = Teacher::marksForSubjectByTeacher($group_id, $subject_id);
        return response()->json($classData);
    }
}
