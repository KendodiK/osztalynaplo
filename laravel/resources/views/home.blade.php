@extends('layout')

@section('content')
        <a class="login-btn" href="{{route('loginStudent')}}">Diák</a>
        <a class="login-btn" href="{{route('loginTeacher')}}">Tanár</a>
@endsection
