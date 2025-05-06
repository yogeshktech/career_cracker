<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Cracker</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/file-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/plyr.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/full-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/editor-quill.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-jvectormap-2.0.5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<!-- Preloader -->
<div class="preloader">
    <div class="loader"></div>
</div>

<div class="side-overlay"></div>

<section class="auth d-flex">
    <div class="auth-left bg-main-50 flex-center p-24">
        <img src="{{ asset('admin/assets/images/logo/auth-img.png') }}" alt="Auth Image">
    </div>
    <div class="auth-right py-40 px-24 flex-center flex-column">
        <div class="auth-right__inner mx-auto w-100">
            <a href="#" class="auth-right__logo mb-4 d-block text-center">
                <img src="{{ asset('admin/assets/images/logo/careercracker.png') }}" alt="Logo">
            </a>
            <h2 class="mb-8">Welcome Back! 👋</h2>
            <p class="text-gray-600 text-15 mb-32">Please sign in to your account and start the adventure</p>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                @if (session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-24">
                    <label for="email" class="form-label mb-8 h6">Email</label>
                    <div class="position-relative">
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control py-11 ps-40" id="email" placeholder="Enter your email">
                        <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                    </div>
                </div>

                <div class="mb-24">
                    <label for="password" class="form-label mb-8 h6">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control py-11 ps-40" id="password" placeholder="Enter password" required>
                        <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-lock"></i></span>
                    </div>
                </div>

                <div class="mb-32 flex-between flex-wrap gap-8">
                    <div class="form-check mb-0 flex-shrink-0">
                        <input class="form-check-input flex-shrink-0 rounded-4" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-15 flex-grow-1" for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-main-600 hover-text-decoration-underline text-15 fw-medium">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-main rounded-pill w-100">Sign In</button>
            </form>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="{{ asset('admin/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/boostrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/phosphor-icon.js') }}"></script>
<script src="{{ asset('admin/assets/js/file-upload.js') }}"></script>
<script src="{{ asset('admin/assets/js/plyr.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="{{ asset('admin/assets/js/full-calendar.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('admin/assets/js/editor-quill.js') }}"></script>
<script src="{{ asset('admin/assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/calendar.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

</body>
</html>
