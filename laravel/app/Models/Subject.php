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
}
