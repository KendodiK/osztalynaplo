@extends('layout')
@section('content')
<div>
    <form action="{{ route('marks.update', $mark->id) }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset>
            <label>Időpont:</label>
            <input type="date" name="date" required value="{{ old('given_at', $mark->given_at) }}">
            <label>Jegy:</label>
            <input type="int" name="mark" required value="{{ old('mark', $mark->mark) }}">
            <label>Tantárgy</label>
            <input type="text" name="subject" required value="{{ old('subject_id', $mark->subject_id) }}">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('teacher.groups') }}">Mégse</a>
    </form>
</div>
@endsection