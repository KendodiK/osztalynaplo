<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','name','gender','group_id','student_code'];

    function marks()
    {
        return $this->hasMany(Mark::class);
    }

    function group()
    {
        return $this->belongsTo(Group::class);
    }

}
