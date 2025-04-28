@extends('layout')

@section('content')
        <form action="{{route('student.login')}}" method="get">
            @csrf
            <input class="login-element" type="text" name="name" placeholder="Név">
            <input class="login-element" type="text" name="code" placeholder="Belépő kód">
            <button class="login" type="submit" name="login">Belépés</button>
        </form>
@endsection
