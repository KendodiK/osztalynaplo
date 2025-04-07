<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Mark;

class SubjectController extends Controller
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
        $tmpStudent = session('student');
        $student = Student::find($tmpStudent['id']);
        $group = Group::find($student['group_id']);

       /* $subjectsForGroups = ConnectSubjectGroupController::find($group)->ConnectSubjectGroupController::all();

        $marksForStudent = Mark::find($student);
        $marks=[];
        
        foreach ($subjectsForGroups as $subjectForGroup) {
            $subjectName = Subject::find($subjectForGroup['subject_id'])->name;
            foreach ($marksForStudent as $markForStudent) {
                if ($subjectForGroup['subject_id'] == $markForStudent['subject_id']) {
                    $marks[] =[
                        "subject" => $subjectName,
                        "mark" => $markForStudent['mark']
                    ];

                }
            }
        }

        $marksWSubjectsInGroup = ksort($jegyek);*/

        $marks = Mark::AVGForSubjects($student->id);
        



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

    public function SUM($grade)
    {

    }
}
