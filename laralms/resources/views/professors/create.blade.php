@extends('template')
@section('content')
<h3>Add a Professor</h3>

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

<form action="{{ route('professors.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="name" placeholder="Professor Name">
    @error('name')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
    <br><br>
    <input type="submit" value="Add Professor">
</form>
@endsection