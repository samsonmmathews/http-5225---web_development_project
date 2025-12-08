<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">LaraLMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('students.index') }}">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('students.create') }}">Add Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('courses.create') }}">Add Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('professors.index') }}">Professors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('professors.create') }}">Add Professor</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>LaraLMS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>
  </body>
</html>