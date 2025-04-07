<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectSubjectsGroup extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['id', 'group_id', 'subject_id'];

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function groups(){
        return $this->belongsTo(Group::class);
    }
}
