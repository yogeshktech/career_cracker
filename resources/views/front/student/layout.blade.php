<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Career Cracker</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fevicon-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/edumall-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/jquery.powertip.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/select2.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
</head>

<body class="dashboard-page dashboard-nav-fixed">
    <div class="dashboard-nav offcanvas offcanvas-start" id="offcanvasDashboard">
        <div class="dashboard-nav__wrapper">
            <div class="offcanvas-header dashboard-nav__header dashboard-nav-header">
                <div class="dashboard-nav__toggle d-xl-none">
                    <button class="toggle-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                </div>
                <div class="header-logo">
                    <a class="header-logo__logo" href="{{ url('') }}"><img src="{{ asset('front/assets/images/careercracker.png') }}" width="296" height="64" alt="Logo"></a>
                </div>
            </div>
            <div class="offcanvas-body dashboard-nav__content navScroll">
                <div class="dashboard-nav__menu">
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <a href="{{ route('student.dashboard') }}">
                                <i class="edumi edumi-layers"></i>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.profile') }}">
                                <i class="edumi edumi-follower"></i>
                                <span class="text">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.enrolled.courses') }}">
                                <i class="edumi edumi-open-book"></i>
                                <span class="text">Enrolled Courses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.purchase.history') }}">
                                <i class="edumi edumi-shopping-cart"></i>
                                <span class="text">Purchase History</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <a href="{{ route('student.settings') }}">
                                <i class="edumi edumi-settings"></i>
                                <span class="text">Settings</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('student.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link"><i class="edumi edumi-sign-out"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="offcanvas-footer"></div>
        </div>
    </div>
    <div class="dashboard-menu">
        <div class="dashboard-menu__close">
            <button class="close-btn"><i class="fas fa-times"></i></button>
        </div>
        <div class="dashboard-menu__content">
            <div class="dashboard-menu__image">
                <img src="assets/images/canvas-menu-image.png" alt="Images" width="984" height="692">
            </div>
            <div class="dashboard-menu__main-menu">
                <ul class="dashboard-menu__menu-link">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('all_course') }}">Courses</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="dashboard-menu__search">
                    <form action="#">
                        <input type="text" placeholder="Search…">
                        <button class="search-btn"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-header">
        <div class="container">
            <div class="dashboard-header__wrap">
                <div class="dashboard-header__toggle-menu d-xl-none">
                    <button class="toggle-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDashboard">
                        <svg width="20px" height="18px" viewBox="0 0 20 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="M18.7179688,2.60581293 L1.28207031,2.60581293 C0.573828125,2.60581293 0,2.02491559 0,1.30798783 C0,0.591060076 0.573828125,0.0101231939 1.28207031,0.0101231939 L18.7179688,0.0101231939 C19.4261719,0.0101231939 20,0.591020532 20,1.30798783 C20,2.02495513 19.4261719,2.60581293 18.7179688,2.60581293 Z"></path>
                            <path d="M11.5384766,10.5957293 L1.28207031,10.5957293 C0.573828125,10.5957293 2.91322522e-13,10.0147924 2.91322522e-13,9.29786464 C2.91322522e-13,8.58093688 0.573828125,8 1.28207031,8 L11.5384766,8 C12.2466797,8 12.8205469,8.58089734 12.8205469,9.29786464 C12.8205469,10.0148319 12.2466797,10.5957293 11.5384766,10.5957293 Z"></path>
                            <path d="M18.7179688,17.6 L1.28207031,17.6 C0.573828125,17.6 0,17.0628683 0,16.4 C0,15.7371317 0.573828125,15.2 1.28207031,15.2 L18.7179688,15.2 C19.4261719,15.2 20,15.7370952 20,16.4 C20,17.0628683 19.4261719,17.6 18.7179688,17.6 Z"></path>
                        </svg>
                    </button>
                </div>
                <div class="dashboard-header__user">
                    <div class="dashboard-header__user-avatar">
                        <img src="{{ $user->avatar ? asset($user->avatar) : asset('front/assets/images/avatar-placeholder.jpg') }}" alt="Avatar" width="90" height="90">
                    </div>
                    <div class="dashboard-header__user-info">
                        <h4 class="dashboard-header__user-name"><span class="welcome-text"></span> {{ Auth::user()->name }}</h4>
                        <div class="dashboard-header__user-rating">
                            <div class="rating-star">
                                <div class="rating-label" style="width: 100%;"></div>
                            </div>
                            <p>4.50 <span>(12 ratings)</span></p>
                        </div>
                    </div>
                </div>
                <div class="dashboard-header__btn">
                    <a class="btn btn-outline-primary" href="{{ route('all_course') }}"><i class="edumi edumi-content-writing"></i> <span class="text">Buy A New Course</span></a>
                </div>
                <div class="dashboard-header__toggle">
                    <button class="btn btn-toggle"><i class="fas fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="container">
        <main class="dashboard-content py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('title')</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>

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
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
</body>
</html>