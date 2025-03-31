@extends('layoutStudent')

@section('content')
    <div class="student-name">
        <h1>{{$marks->name}}</h1>
    </div>
    <ul>
        <li class="studentTableHead">
            <div class="1"><p>Tantárgy</p></div>
            <div class="2"><p>Tanár</p></div>
            <div class="3"><p>Osztályzat</p></div>
        </li>
        @foreach($marks->mark)
        <li>
            <div class="1"><p>{{$mark->teacher}}</p></div>
            <div class="2"><p>{{$mark->subject}}</p></div>
            <div class="3"><p>{{$mark->mark}}</p></div>
        </li>
        @endforeach
    </ul>
@endsection
