@extends('template')
@section('content')
    <h1>All Students</h1>
    <div class="container">
        <div class="row">
            @foreach ($students as $student)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $student -> fname }} {{ $student -> lname }} </h5>
                            <a href="mailto:{{ $student -> email }}" class="btn btn-primary">{{ $student -> email }}</a>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('students.edit', $student -> id ) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('students.destroy', $student -> id ) }}" method="post">
                                <input type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection