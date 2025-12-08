@extends('template')
@section('content')
<h3>Update Professor Details</h3>

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

<form action="{{ route('professors.update', $professor -> id) }}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="name" class="form-label" type="text" name="name" placeholder="Email">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ $professor -> name }}" aria-label="First name">
        @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <input type="submit" value="Update Professor">
</form>
@endsection