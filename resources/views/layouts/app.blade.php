<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Lessons</a>
        <div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('lessons.index') }}">Lessons</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    @yield('scripts')
</body>
</html>
