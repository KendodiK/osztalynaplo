<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectSubjectsGroupTeacher extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $fillable = [ 'id', 'subject_id', 'teacher_id'];

    function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    function subject(){
        return $this->belongsTo(Subject::class);
    }
}
