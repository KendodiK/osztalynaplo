@extends('layout')
@section('content')
<div>
    <form action="{{ route('marks.update', $mark->id) }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset>
            <div class="display-subject">
                <label>{{ old('subject_name', $mark->subject->subject_name) }}</label>
                <input type="hidden" name="subject" required value="{{ old('subject_id') }}">
            </div>
            <div class="editable">
                <div class="set-mark-time">
                    <label>Időpont:</label>
                    <input type="date" name="date" required value="{{ old('given_at', $mark->given_at) }}">
                </div>
                <div class="set-mark">
                    <label>Jegy:</label>
                    <input type="int" name="mark" required value="{{ old('mark', $mark->mark) }}">
                </div>
            </div>
        </fieldset>
        <div class="save-buttons">
            <button type="submit" name="return">Mégse</button>
            <button type="submit" name="save">Ment</button>
        </div>
    </form>
</div>
@endsection
