@extends('template')
@section('content')
<h3>Update Course</h3>

<form action="{{ route('courses.update', $course -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <input type="text" name="name" value="{{ $course -> name }}">
    <br><br>
    <input type="text" name="description" value="{{ $course -> description }}">
    <br><br>
    <input type="submit" value="Update Course">
</form>
@endsection