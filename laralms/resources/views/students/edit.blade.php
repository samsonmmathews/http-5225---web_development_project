@extends('template')
@section('content')
<h3>Update Student Details</h3>

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

<form action="{{ route('students.update', $student -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <div class="row">
        <div class="col">
            <label for="fname" class="form-label" type="text" name="fname">First Name</label>
            <input id="fname" type="text" class="form-control" name="fname" value="{{ $student -> fname }}" aria-label="First name">
            @error('fname')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col">
            <label for="lname" class="form-label" type="text" name="lname">Last Name</label>
            <input id="lname" type="text" class="form-control" name="lname" value="{{ $student -> lname }}" aria-label="Last name">
            @error('lname')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label" type="email" name="email" placeholder="Email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $student -> email }}" aria-describedby="emailHelp">
        @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <input type="submit" value="Update Student">
</form>
@endsection