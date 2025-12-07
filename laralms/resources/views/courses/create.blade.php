@extends('template')
@section('content')
<h3>Add a Course</h3>

<div class="container">
    <div class="row">
        <div class="col">
            @if($errors -> any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

<form action="{{ route('courses.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="course" placeholder="Course Name">
    @error('course')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
    <br><br>
    <input type="text" name="description" placeholder="Description">
    @error('description')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
    <br><br>
    <input type="submit" value="Add Course">
</form>
@endsection