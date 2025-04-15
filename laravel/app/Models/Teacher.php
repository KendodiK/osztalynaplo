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

    public static function marksForSubjectByTeacher($group_id, $subject_id)
    {
        $groupId = $group_id;
        $subjectId = $subject_id;

        $marks = Mark::join('students', 'marks.student_id', '=', 'students.id')
            ->join('subjects', 'marks.subject_id', '=', 'subjects.id')
            ->select('students.name', 'students.id as studentId', 'students.group_id', 'subjects.subject_name', 'marks.mark', 'marks.given_at')
            ->whereIn('marks.student_id', function ($query) use ($groupId) {
                $query->select('id')
                    ->from('students')
                    ->where('group_id', $groupId);
            })
            ->whereIn('marks.subject_id', function ($query) use ($subjectId) {
                $query->select('id')
                    ->from('subjects')
                    ->where('subject_id', $subjectId);
            })
            ->orderBy('students.name')
            ->get();

        $marks = $marks->map(function ($mark) use ($subjectId) {
            $result = Mark::StudentAVGBySubject($mark->studentId, $subjectId);
            $mark->avg = $result->average_mark;
        });

        return $marks;
    }

    public static function ClassAVGForSubjects($group_id,$subject_name)
    {
        $groupId = $group_id;
        $subjectName = $subject_name;

        $classAverage = Mark::join('students', 'marks.student_id', '=', 'students.id')
            ->join('subjects', 'marks.subject_id', '=', 'subjects.id')
            ->whereIn('marks.student_id', function ($query) use ($groupId) {
                $query->select('id')
                    ->from('students')
                    ->where('group_id', $groupId);
            })
            ->whereIn('marks.subject_id', function ($query) use ($subjectName) {
                $query->select('id')
                    ->from('subjects')
                    ->where('subject_name', $subjectName);
            })
            ->avg('marks.mark');
    }





}
