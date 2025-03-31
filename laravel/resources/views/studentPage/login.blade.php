@extends('layout')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

@section('content')
        <form action="{{route('student.login')}}" method="get">
            @csrf
<<<<<<< HEAD
            <input type="text" name="name" placeholder="Név">
            <input type="text" name="group" placeholder="Osztály">

            <button type="submit">Belépés</button>
=======
            <input class="login-element" type="text" name="name" placeholder="Név">
            <input class="login-element" type="text" name="group" placeholder="Osztály">
            <input class="login-element" type="text" name="code" placeholder="Belépő kód">
            <button class="login" type="submit">Belépés</button>
>>>>>>> e8bd38ac5d9f4208761afc2ab71ba717e0634141
        </form>
@endsection
