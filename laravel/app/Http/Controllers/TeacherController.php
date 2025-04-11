<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
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

    }

    public  function login()
    {
        $teachers = Teacher::all();
        $name = request('name');
        $code = request('code');
        foreach ($teachers as $teacher) {
            if ($teacher->name == $name && $teacher->identification_code == $code) {
                $connections = ConnectSubjectsGroupTeacherConroller::getByTeacher($teacher->id);
                Session::put('teacher', $teacher);
                return view('teacherPage.index', compact('connections'));
            }
        }
        return view('teacherPage.login')->with('errors', 'Nincs a megadottaknak megfelelő tanár');
    }
}
