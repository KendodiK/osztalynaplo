<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','subject_name'];



    function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function AVGForSubjects($student_id)
    {
        $query = "SELECT AVG(mark),subjects.subject_name FROM `marks` JOIN subjects ON marks.subject_id = subjects.id WHERE student_id = $student_id  GROUP BY subject_name";
    }
}
