@extends('teacherPage.index')
@section('content')
    <div class="student">
        <div class="name">{{$student->name}}</div>
        <div class="class">{{$student->group->number}}.{{$student->group->sign}}</div>
        <div>
        @foreach($connections as $connection)
            <button class="groupBtn" type="button" id="groupBtn-{{$connection->id}}"  name="groupBtn" data-value="{{$connection->subject->id}}" value="{{$connection->group->id}}">
                {{$connection->subject->subject_name}}
            </button>
        @endforeach
        </div>
    </div>
@endsection
