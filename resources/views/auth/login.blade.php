<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Aplikasi Anda</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="card shadow-sm w-100" style="max-width: 400px;">
    <div class="card-body">
      
      <!-- Logo -->
      <div class="text-center mb-3">
        <img src="{{ asset('img/hero-img.png') }}" alt="Logo Aplikasi" class="img-fluid" style="max-height: 80px;">
      </div>

      <h4 class="text-center mb-1">Login Form</h4>
      <p class="text-center text-muted mb-2">Mari mulai produktif hari ini. Silakan login dulu ya!</p>

      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form method="POST" action="/login">
        @csrf

        <!-- Email Input -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" id="email" name="email" class="form-control" required autofocus>
          </div>
        </div>

        <!-- Password Input -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        {{-- <!-- Link to Register -->
        <div class="text-center">
          <small class="text-muted">
            Belum punya akun?
            <a href="/register" class="text-decoration-none">Daftar di sini</a>
          </small>
        </div> --}}

      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
