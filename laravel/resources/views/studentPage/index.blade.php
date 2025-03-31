@extends('layoutStudent')

@section('content')
    <div class="student-name">

    </div>
    <ul>
        <li class="studentTableHead">
            <div class="1"><p>Tantárgy</p></div>
            <div class="2"><p>Tanár</p></div>
            <div class="3"><p>Osztályzat</p></div>
        </li>
        @foreach($marks as $mark)
        <li>
            <div class="1"><p>{{$mark->given_at}}</p></div>
            <div class="2"><p>{{$mark->subject_id}}</p></div>
            <div class="3"><p>{{$mark->mark}}</p></div>
        </li>
        @endforeach
    </ul>
@endsection
