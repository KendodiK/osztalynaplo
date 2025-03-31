<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['given_at', 'student_id', 'subject_id', 'mark'];

}
