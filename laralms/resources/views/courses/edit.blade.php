@extends('template')
@section('content')
<h3>Update Course Details</h3>

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

<form action="{{ route('courses.update', $course -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="name" class="form-label" type="text" name="name" placeholder="Email">Course Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ $course -> name }}" aria-label="First name">
        @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label" type="text" name="description">Description</label>
        <input id="description" type="text" class="form-control" name="description" value="{{ $course -> description }}" aria-label="Description">
        @error('description')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <input type="submit" value="Update Course">
</form>
@endsection