@extends('template')
@section('content')
<h3>Add a Student</h3>
<form action="{{ route('students.store') }}"
method="POST">
    {{ csrf_field() }}
    <input type="text" name="fname" placeholder="First Name">
    <br><br>
    <input type="text" name="lname" placeholder="Last Name">
    <br><br>
    <input type="email" name="email" placeholder="Email">
    <br><br>
    <input type="submit" value="Add Student">
</form>
@endsection