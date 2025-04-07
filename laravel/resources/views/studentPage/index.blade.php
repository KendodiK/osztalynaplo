@extends('layoutStudent')

@section('content')
    <div class="student-data">
        <div class="name">{{$student->name}}</div>
        <div class="class">{{$student->group->number}}.{{$student->group->sign}}</div>
    </div>
    <ul class="student-table">
        <li class="student-table-head">
            <div><p>Dátum</p></div>
            <div><p>Tantárgy</p></div>
            <div><p>Osztályzat</p></div>
        </li>
        @foreach($marks as $mark)
        <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
            <div><p>{{$mark->given_at}}</p></div>
            <div><p>{{$mark->subject->subject_name}}</p></div>
            <div><p>{{$mark->mark}}</p></div>
        </li>
        @endforeach
    </ul>
@endsection
