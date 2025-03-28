@extends('layout')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

@section('content')
        <form action="{{route('student.login')}}" method="get">
            @csrf
            <input class="login-element" type="text" name="name" placeholder="Név">
            <input class="login-element" type="text" name="group" placeholder="Osztály">
            <input class="login-element" type="text" name="code" placeholder="Belépő kód">
            <button class="login" type="submit">Belépés</button>
        </form>
@endsection
