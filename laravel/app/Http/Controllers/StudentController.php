<?php

namespace App\Http\Controllers;

use App\Models\ConnectSubjectsGroupTeacher;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function Laravel\Prompts\error;

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
            return redirect()->route('student.marks');
            }
        }
        return view('studentPage.login')->with('errors', 'Nincs a megadottaknak megfelelő diák');
    }

    public  function showAllByGroupId($group_id, $subject_id)
    {
        $classData = Teacher::marksForSubjectByTeacher($group_id, $subject_id);
        return response()->json($classData);
    }

    public  function  getStudentByTeacher(Request $request)
    {
        $name = $request->input('searched');
        $student = Student::where('name', $name)->firstOrFail();

        if(!is_a($student, ModelNotFoundException::class)) {
            $valid = false;
            $teacherId = Session::get('teacher')->id;
            $connections = ConnectSubjectsGroupTeacher::where('teacher_id', $teacherId)->get();
            foreach ($connections as $conncection) {
                if ($conncection->group_id == $student->group_id) {
                    $valid = true;
                }
            }
            if ($valid) {
                $connections = array_values(array_filter($connections, function ($connection) use ($student) {
                    return $connection->subject_id == $student->subject_id;
                }));
                return view('teacherPage.student', compact('student', 'connections'));
            }
        }
        return view('teacherPage.login', true)->with('errors', 'A tanítványok között nem szerepel a keresett diák');
    }
}
