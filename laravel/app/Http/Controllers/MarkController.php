<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
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
    public function show(array $student)    
    {
        $id = $student->id; // nem jó hogy szopjál le
        $marks = Mark::all();
        $jegyek = [];
        foreach ($marks as $mark) {
            if($id==$mark->student_id){
                $jegyek[] =[
                    'given_at' => $mark->given_at,
                    'subject_id' => $mark->subject_id,
                    'mark' => $mark->mark,
                ];
            };
        }
        dump($jegyek);
        return view( 'studentPage.index', compact('jegyek'));

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
}
