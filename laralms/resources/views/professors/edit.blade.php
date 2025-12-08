@extends('template')
@section('content')
<h3>Update Professor Details</h3>

<form action="{{ route('professors.update', $professor -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <input type="text" name="name" value="{{ $professor -> name }}">
    <br><br>
    <input type="submit" value="Update Professor">
</form>
@endsection