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
    <div class="mb-3">
        <label for="name" class="form-label" type="text" name="name" placeholder="Email">Course Name</label>
        <input id="name" type="text" class="form-control" name="name" placeholder="Please enter the course name" aria-label="First name">
        @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label" type="text" name="description">Description</label>
        <input id="description" type="text" class="form-control" name="description" placeholder="Please enter the course description" aria-label="Description">
        @error('description')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Select a Professor:</label><br>
        <select name="professor_id" id="professor_id" class="form-select form-select-lg border-primary shadow-sm">
            <option value="" selected disabled>Select a Professor</option>
        @foreach ($professors as $professor)
            <option value="{{$professor->id}}">{{$professor-> name}}</option>
        @endforeach
        </select>
        <br>
    </div>
    <input type="submit" value="Add Course">
</form>
@endsection