<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mark extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','given_at','student_id','subject_id','mark'];

    function student()
    {
        return $this->belongsTo(Student::class);
    }

    function subject()
    {
        $resoult = $this->belongsTo(Subject::class);
        return $resoult;
    }

    public static function AVGForSubjects($student_id)
    {



        $studentId = $student_id; // Állítsd be a diák azonosítóját

        $results = DB::table('marks')
            ->selectRaw('AVG(mark) as average_mark, subjects.subject_name')
            ->join('subjects', 'marks.subject_id', '=', 'subjects.id')
            ->where('student_id', $studentId)
            ->groupBy('subjects.subject_name')
            ->get();

        return $results;

    }

    public static function studentAVG($student_id)
    {
        //$query = "SELECT AVG(mark) FROM `marks` WHERE student_id = $student_id";

        $studentId = $student_id; // Állítsd be a diák azonosítóját

        $results = DB::table('marks')
            ->selectRaw('AVG(mark) as student_average')
            ->where('student_id',$studentId)
            ->get();

        return $results;

    }

    public static function marksForStud($student_id)
    {
        $studentId = $student_id; // Állítsd be a diák azonosítóját

        $results = Mark::select('marks.mark', 'subjects.subject_name', 'marks.given_at')
        ->join('subjects', 'marks.subject_id', '=', 'subjects.id')
        ->where('marks.student_id', $studentId)
        ->orderBy('marks.given_at', 'desc')
        ->get();

        return $results;
    }
}
