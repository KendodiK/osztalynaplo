<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
