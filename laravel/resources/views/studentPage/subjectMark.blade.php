@extends('layoutStudent')

@section('content')
    <div class="student-data">
        <div class="name">{{$student->name}}</div>
        <div class="class">{{$student->group->number}}.{{$student->group->sign}}</div>
        <a class="groupBtn" href="{{ route('home',['sort_by' => 'name','sort_dir' => 'asc']) }}" title="ABC">↑</a>
        <a class="groupBtn" href="{{ route('home',['sort_by' => 'name','sort_dir' => 'desc']) }}" title="ZYX">↓</a>
    </div>

        <ul class="student-table">

            @foreach($AVG as $average)
                <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                    <div class="student-by-subj-table">
                        <div class="top">{{$average->subject_name}}</div>
                        <div class="top">Átlag: {{$average->average_mark}}</div>
                        <div class="bottom">
                            @foreach($marks as $mark)
                                @if($mark->subject_name == $average->subject_name)
                                    {{$mark->mark}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
@endsection
