@extends('layout')

@section('content')
<div>
    <h1>Hozzáadás</h1>
</div>

<form action="{{ route('marks.add') }}" method="post">
    @csrf
<fieldset>
    <Label for="name">Név:</Label>
    <input type="text" id="name" name="name" placeholder="Név">
    <br>
    <Label for="student_id">Tanuló száma:</Label>
    <input type="int" id="student_id" name="student_id">
    <br>
    <Label for="subject_id">Tantárgy száma:</Label>
    <input type="int" id="subject_id" name="subject_id">

</fieldset>
@endsection