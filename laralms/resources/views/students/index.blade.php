@extends('template')
@section('content')
    <h1>All Students</h1>

    @foreach ($students as $student)
        {{ $student -> fname }} {{ $student -> lname }} 
        <a href="{{ route('students.edit', $student -> id ) }}" class="card-link">Edit</a>
        {{-- <a href="{{ route('students.trash', $student -> id )}}" class="card-link">Delete</a> --}}
        <form action="{{ route('students.destroy', $student -> id ) }}" method="post">
            <input type="submit" value="Delete" />
            @method('delete')
            @csrf
        </form>
        <br>
    @endforeach
@endsection