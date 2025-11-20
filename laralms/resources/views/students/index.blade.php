<h1>All Students</h1>

@foreach ($students as $student)
    {{ $student -> fname }} <br>
@endforeach