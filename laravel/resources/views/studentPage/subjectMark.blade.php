@extends('layoutStudent')

@section('content')
    <div class="student-data">
        <div class="name">{{$student->name}}</div>
        <div class="class">{{$student->group->number}}.{{$student->group->sign}}</div>
    </div>
    <ul class="student-table">
        @foreach($subjectMarks as $mark)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="subject-name"></div>
                <div class="avg"> </div>
                <div class="marks"></div>
            </li>
        @endforeach
    </ul>
@endsection
