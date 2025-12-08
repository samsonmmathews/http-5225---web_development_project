@extends('template')
@section('content')
<h3>Add a Student</h3>

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

<form action="{{ route('students.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col">
            <label for="fname" class="form-label" type="text" name="fname">First Name</label>
            <input id="fname" type="text" class="form-control" name="fname" placeholder="Please enter the first name" aria-label="First name">
            @error('fname')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col">
            <label for="lname" class="form-label" type="text" name="lname">Last Name</label>
            <input id="lname" type="text" class="form-control" name="lname" placeholder="Please enter the last name" aria-label="Last name">
            @error('lname')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label" type="email" name="email" placeholder="Email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Please enter the email" aria-describedby="emailHelp">
        @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <input type="submit" value="Add Student">
</form>
@endsection