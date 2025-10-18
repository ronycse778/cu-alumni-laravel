<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CU Alumni Association') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif; }
        .hero { background: #f8fbff; padding: 60px 0; }
        .footer { background:#0f1c1f; color:#fff; padding:40px 0; }
        .footer a{ color:#cfe9ff; text-decoration:none; }
        .section-title{ font-weight:700; margin-bottom:20px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">CU Alumni</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample" aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/news">News</a></li>
        <li class="nav-item"><a class="nav-link" href="/notices">Notice</a></li>
        <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('login') }}">Member Login</a></li>
        @else
            <li class="nav-item me-2"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">@csrf <button class="btn btn-outline-secondary btn-sm">Logout</button></form>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="footer mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5 class="mb-3">CU Alumni Association</h5>
        <p>Ground Floor - Chittagong University, Information Center, Institute of Fine Arts</p>
      </div>
      <div class="col-md-6 text-md-end">
        <a class="me-2" href="#"><i class="fab fa-facebook"></i></a>
        <a class="me-2" href="#"><i class="fab fa-twitter"></i></a>
        <a class="me-2" href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
