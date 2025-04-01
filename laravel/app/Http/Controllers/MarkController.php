<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Subject;
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
        $student = session('student');
        if ($student) {
            $id =  $student['id'];
        }

        $marks = Mark::where('student_id', $id)->get();
        foreach ($marks as $mark) {
            $mark=$this->tantargyakHozzaAdasa($mark);
            return view( 'studentPage.index', compact('mark'));

        }
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

    public function tantargyakHozzaAdasa($mark)
    {
        $mark -> subject_id = Subject::find($mark->id)->subject_name ?? null;
        return $mark;
    }
}
