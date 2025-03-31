<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
<<<<<<< HEAD
            if ($student->name == $name && $student->class == $class) {
                return route('student.marks', compact( 'student'));
=======
            if ($student->name == $name && $student->student_code == $student_code) {
                return view('studentPage.index', compact('student'));
>>>>>>> 076f9cdadf85ec292cf5005989ab042855ba8031
            }
        }
        return view('studentPage.login')->with('errors', 'Nincs a megadottaknak megfelelő diák');
    }
}
