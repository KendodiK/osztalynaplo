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
    public function create($marks)
    {
        $mark= new Mark();
        $grade = $marks;

        $mark->given_at=date('Y-m-d');
        $mark->student_id=request('student_id');
        $mark->subject_id = request('subject_id');
        $mark->mark->$grade;

        $mark->save();
        return  route('teacher.groups');

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

    public function tantargyakHozzaAdasa($mark)
    {
        /*foreach ($marks as $mark){
            $subject = Subject::find($mark->id);
            $name = $subject->subject_name;
            $mark->subject_name = $name;
        }
        return $marks;*/
    }

    public  function  getStudent()
    {
        $tmpStudent = Session::get('student');
        return Student::find($tmpStudent['id']);
    }

    public function showGroupMarks()
    {
        $student = $this->getStudent();
        $AVG = Mark::AVGForSubjects($student->id);
        $marks = Mark::marksForStud($student->id);
        return view('studentPage.subjectMark', compact('student','AVG','marks'));
    }

    public function destroy($id){
        $mark = Mark::find($id);
        $mark->delete();
        return redirect()->route('teacher.groups')->with('success', "Sikeresen Törölve");
    }



    public function edit($id){
        $mark = Mark::find($id);
        return view('teacherPage.edit', compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        if(request()->has('save')) {
            $mark = Mark::find($id);
            $mark->mark = $request->input('mark');
            $mark->given_at = $request->input('date');

            $mark->save();
        }
        return redirect()->route('teacher.site', true)->with('success');
    }

    public function addMark($subjectName, $studentId)
    {
        $student = Student::find($studentId);
        $subject = Subject::where('subject_Name', "=", $subjectName)->first();
        return view('teacherPage.create', compact('student', 'subject'));
    }

    public function add(Request $request)
    {
        if(request()->has('save')) {
            $mark = new Mark();

            $date = $request->input('date');
            if($date == null) {
                $date = date('Y-m-d');
            }
            $mark->given_at = $date;
            $mark->student_id = $request->input('student');
            $mark->subject_id = $request->input('subject');
            $mark->mark = $request->input('mark');
            $mark->save();
        }

        return redirect()->route('teacher.site', true)->with('success');
    }
}
