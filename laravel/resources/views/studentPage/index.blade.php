@extends('layoutStudent')

@section('content')
    <div class="student-name">

    </div>
    <ul class="student-table">
        <li class="student-table-head">
            <div class="1"><p>Dátum</p></div>
            <div class="2"><p>Tantárgy</p></div>
            <div class="3"><p>Osztályzat</p></div>
        </li>
        @foreach($marks as $mark)
        <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
            <div><p>{{$mark->given_at}}</p></div>
            <div><p>{{$mark->subject->name}}</p></div>
            <div><p>{{$mark->mark}}</p></div>
        </li>
        @endforeach
    </ul>
@endsection
