<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic Title & Description -->
    <title>@yield('title', 'Career Cracker')</title>
    <meta name="description" content="@yield('description', 'Career Cracker helps you crack your dream job with expert guidance, resources, and career tips.')">
    <meta name="keywords" content="career cracker, jobs, career guidance, interview tips, resume tips, job search, placement preparation">
    <meta name="author" content="Career Cracker">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Career Cracker - Crack Your Dream Career">
    <meta property="og:description" content="Get expert career guidance, job interview tips, resume hacks, and resources to crack your dream job.">
    <meta property="og:image" content="https://careercracker.com/front/assets/images/og-image.jpg">
    <meta property="og:url" content="https://careercracker.com/">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Career Cracker - Crack Your Dream Career">
    <meta name="twitter:description" content="Explore career tips, job guidance, and resources to crack your dream career.">
    <meta name="twitter:image" content="https://careercracker.com/front/assets/images/og-image.jpg">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://careercracker.com/">

    <!-- Favicon -->
    <link rel="icon" href="https://careercracker.com/front/assets/images/fevicon-icon.png" type="image/png">

    <!-- Font Awesome (Latest) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17183580383"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-17183580383');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/edumall-icon.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/jquery.powertip.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/select2.min.css') }}">

    <!-- Bootstrap CDN (optional, if not using vendor/bootstrap.min.css above) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @yield('styles')

    <!-- Responsive CSS -->
    <style>
        /* Mobile Responsive Styles */
        @media (max-width: 767px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            /* Adjust font sizes for mobile */
            h1 {
                font-size: 1.8rem !important;
            }

            h2 {
                font-size: 1.5rem !important;
            }

            h3 {
                font-size: 1.3rem !important;
            }

            /* Improve mobile navigation */
            .header-top-bar-wrap__info-list {
                flex-direction: column;
                align-items: center;
            }

            /* Make buttons full width on mobile */
            .btn {
                width: 100%;
                margin: 5px 0;
            }

            /* Adjust course cards for mobile */
            .course-item {
                margin-bottom: 20px;
            }

            /* Improve filter visibility on mobile */
            .filter-collapse .card-body {
                padding: 10px;
            }

            .widget-filter__wrapper {
                max-height: 200px;
                overflow-y: auto;
            }

            /* Improve FAQ accordion on mobile */
            .accordion-button {
                padding: 10px;
                font-size: 14px;
            }

            .accordion-body {
                padding: 10px;
                font-size: 14px;
            }

            /* Improve form elements on mobile */
            input,
            select,
            textarea {
                font-size: 16px !important;
                /* Prevent zoom on iOS */
            }

            /* Adjust spacing for mobile */
            .section-padding-01 {
                padding: 40px 0;
            }

            /* Improve modal display on mobile */
            .modal-dialog {
                margin: 10px;
            }

            .modal-content {
                padding: 15px;
            }
        }

        /* Tablet Responsive Styles */
        @media (min-width: 768px) and (max-width: 991px) {
            .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            /* Adjust grid columns for tablets */
            .col-md-4 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

    </style>

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
</head>


<body>
    <main class="main-wrapper">
        @include('front.layouts.header')
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success'
                , title: 'Success'
                , text: "{{ session('success') }}"
                , confirmButtonColor: '#3085d6'
            , });

        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error'
                , title: 'Oops!'
                , text: "{{ session('error') }}"
                , confirmButtonColor: '#d33'
            , });

        </script>
        @endif

        @yield('content')
        @include('front.layouts.footer')
        <!--Back To Start-->
        {{-- <button id="backBtn" class="back-to-top backBtn">
            <i class="arrow-top fas fa-arrow-up"></i>
            <i class="arrow-bottom fas fa-arrow-up"></i>
        </button> --}}
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
