@extends('layout')

@section('content')
<form action="{{ route('marks.add') }}" method="post">
    @csrf
    <fieldset>
        <div class="display-subject">
            <label>Jegy hozzáadása - {{ $subject->subject_name }}</label>
            <input type="hidden" name="subject" value="{{$subject->id}}">
        </div>
        <div class="add-name">
            <label for="name">{{$student->name}} (id:{{$student->id}})</label>
            <input type="hidden" name="student" value="{{$student->id}}">
        </div>
        <div class="editable">
            <div class="set-mark-time">
                <label for="date">Dátum:</label>
                <input type="date" name="date">
            </div>
            <div class="set-mark">
                <label for="mark">Jegy:</label>
                <input type="number" min="1" max="5" name="mark" >
            </div>
        </div>
    </fieldset>
    <div class="save-buttons">
        <button type="submit" name="return">Mégse</button>
        <button type="submit" name="save">Ment</button>
    </div>
@endsection
