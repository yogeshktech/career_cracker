<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Career Cracker')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', '')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/images/fevicon-icon.png') }}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/edumall-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/jquery.powertip.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/select2.min.css') }}">

    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @yield('styles')
</head>
<style>
   
.header-top-bar-wrap__info-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 1rem;
}

.header-top-bar-wrap__info-list li {
    font-size: 1rem;
}

.btn-link {
    color: #007bff;
    text-decoration: none;
    background: none;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
}

.btn-link:hover {
    text-decoration: underline;
    color: #0056b3;
}

.user-name {
    color: #333;
    font-weight: 500;
}

</style>
<body>



    <main class="main-wrapper">
        @include('front.layouts.header')
        @yield('content')
        @include('front.layouts.footer')
        <!--Back To Start-->
        <button id="backBtn" class="back-to-top backBtn">
            <i class="arrow-top fas fa-arrow-up"></i>
            <i class="arrow-bottom fas fa-arrow-up"></i>
        </button>
    </main>


    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('front/assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/parallax.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.powertip.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.sticky-kit.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/flatpickr.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/range-slider.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/select2.min.js') }}"></script>


    <!-- Activation JS -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    <!-- Additional Scripts -->
    @yield('scripts')
</body>
</html>