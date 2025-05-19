@extends('layout')

@section('content')
<div>
    <h1>Hozzáadás</h1>
</div>

<form action="{{ route('marks.add') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Név: {{$student->name}} ({{$student->id}})</label>
        <input type="hidden" name="student" value="{{$student->id}}">
        <label for="subject_id">Tantárgy: {{$subject->subject_name}}</label>
        <input type="hidden" name="subject" value="{{$subject->id}}">
        <label for="mark">Jegy:</label>
        <input type="number" min="1" max="5" name="mark" >
        <label for="date">Dátum:</label>
        <input type="date" name="date">
    </fieldset>
    <div class="save-buttons">
        <button type="submit" name="return">Mégse</button>
        <button type="submit" name="save">Ment</button>
    </div>
@endsection
