@extends('template')
@section('content')
<h3>Update Student</h3>

<form action="{{ route('students.update', $student -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <input type="text" name="fname" value="{{ $student -> fname }}">
    <br><br>
    <input type="text" name="lname" value="{{ $student -> lname }}">
    <br><br>
    <input type="email" name="email" value="{{ $student -> email }}">
    <br><br>
    <input type="submit" value="Update Student">
</form>
@endsection