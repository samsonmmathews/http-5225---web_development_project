@extends('template')
@section('content')
    <h1>All Courses</h1>
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">{{ $course -> course }} </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Description: {{ $course->description }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('courses.edit', $course -> id ) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('courses.destroy', $course -> id ) }}" method="post">
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