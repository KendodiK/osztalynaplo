@extends('teacherPage.index')
@section('content')
    @foreach($students as $student)
        <div class="student">
            <div class="name">{{$student->name}}</div>
            <div class="class">{{$student->group->number}}.{{$student->group->sign}}</div>
            <div>
                @foreach($connections as $connection)
                    @if($connection->group_id == $student->group_id)
                        <button class="groupBtn" type="button" id="groupBtn-{{$connection->id}}"  name="groupBtn" data-value="{{$connection->subject->id}}" value="{{$connection->group->id}}">
                            {{$connection->subject->subject_name}}
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
