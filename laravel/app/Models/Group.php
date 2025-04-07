<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','number','sign','start_time'];

    function student()
    {
        return $this->hasMany(Student::class);
    }

    function connectSubjectsGroupTeacher()
    {
        return $this->hasMany(ConnectSubjectsGroupTeacher::class);
    }

    function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
