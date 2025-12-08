@extends('template')
@section('content')
    <h1>All Professors</h1>
    <div class="container">
        <div class="row">
            @foreach ($professors as $professor)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">{{ $professor -> name }} </h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('professors.edit', $professor -> id ) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('professors.destroy', $professor -> id ) }}" method="post">
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