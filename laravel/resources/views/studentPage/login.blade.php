@extends('layout')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

@section('content')
    <div class="login">
        <form action="{{route('teacher.login')}}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Név">
            <input type="text" name="class" placeholder="Osztály">
            <button type="submit">Belépés</button>
        </form>
    </div>
@endsection
