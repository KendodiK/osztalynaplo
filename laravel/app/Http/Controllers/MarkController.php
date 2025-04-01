<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show()
    {
        $student = $this->getStudent();
        $marks = $student->marks;
        return view( 'studentPage.index', compact('marks', 'student'));

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

    public function tantargyakHozzaAdasa($marks)
    {
        foreach ($marks as $mark){
            $subject = Subject::find($mark->id);
            $name = $subject->subject_name;
            $mark->subject_name = $name;
        }
        return $marks;
    }

    public  function  getStudent()
    {
        $tmpStudent = Session::get('student');
        return Student::find($tmpStudent['id']);
    }

    public function showGroupMarks()
    {
        $student = $this->getStudent();
        return view('studentPage.subjectMark', compact('student'));
    }
}
