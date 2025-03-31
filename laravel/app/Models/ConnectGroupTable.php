<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectGroupTable extends Model
{
    use HasFactory;

    public $timespace = false;
    
    protected $fillable = ['id', 'group_id', 'subject_id'];

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function groups(){
        return $this->belongsTo(Group::class);
    }
}
