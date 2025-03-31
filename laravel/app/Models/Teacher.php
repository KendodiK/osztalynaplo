<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Teacher extends EloquentModel
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','name','class_id','username','identification_code'];

    function group()
    {
        return $this->hasMany(Group::class,'class_id');
    }
}
