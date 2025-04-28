@extends('layout')
@section('content')
<div>
    <form action="{{ route('marks.update', $mark->id) }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset>
            <div class="display-subject">
                <label>Tantárgy: {{ old('subject_name', $mark->subject->subject_name) }}</label>
                <input type="hidden" name="subject" required value="{{ old('subject_id') }}">
            </div>
            <div class="set-mark-time">
                <label>Időpont:</label>
                <input type="date" name="date" required value="{{ old('given_at', $mark->given_at) }}">
            </div>
            <div class="set-mark">
                <label>Jegy:</label>
                <input type="int" name="mark" required value="{{ old('mark', $mark->mark) }}">
            </div>
        </fieldset>
        <button type="submit">Ment</button>
    </form>
    <a href="{{ route('teacher.login') }}">Mégse</a>
</div>
@endsection
