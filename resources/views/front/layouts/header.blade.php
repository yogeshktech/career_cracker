<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Cracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
            min-height: 1.25rem;
        }
        .modal-form {
            margin-bottom: 1rem;
        }
        #termsContent.show {
            display: block !important;
        }
    </style>
</head>
<body>
<main class="main-wrapper">
    <div class="header-section header-sticky">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="header-top-bar-wrap d-sm-flex justify-content-between align-items-center">
                    <div class="header-top-bar-wrap__info">
                        <ul class="header-top-bar-wrap__info-list">
                            <li><a href="tel:9867-679-600"><i class="fas fa-phone"></i> <span class="info-text">9867-679-600</span></a></li>
                            <li><a href="mailto:info@careercracker.com"><i class="far fa-envelope"></i> <span class="info-text">info@careercracker.com</span></a></li>
                        </ul>
                    </div>
                    <div class="header-top-bar-wrap__info d-sm-flex">
                        <ul class="header-top-bar-wrap__info-list">
                            @guest
                            <li class="d-none d-lg-block"><button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-link">Log in </button></li>
                            <li class="d-none d-lg-block"><button data-bs-toggle="modal" data-bs-target="#registerModal" class="btn btn-link">Register </button></li>
                            @endguest
                            @auth
                            <li class="d-none d-lg-block">
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle text-light" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu profile-menu" aria-labelledby="profileDropdown">
                                        <li class="d-flex justify-content-between align-items-center px-3 gap-2 w-100">
                                            <a href="{{ route('student.dashboard') }}" class="text-dark">Profile</a>
                                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-link text-dark p-0">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endauth
                        </ul>
                        <ul class="header-top-bar-wrap__info-social">
                            <li><a href="https://t.me/+BuELwY2y0GowNzJl" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
                            <li><a href="https://www.facebook.com/profile.php?id=61569816428607" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/careercracker_academy?igsh=MXJ0NWhvN2xtMms5YQ%3D%3D&utm_source=qr" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/careercracker-academy/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="header-main-wrapper">
                    <div class="header-logo">
                        <a class="header-logo__logo" href="{{url('/')}}"><img src="{{ asset('front/assets/images/careercracker.png') }}" width="296" height="64" alt="Logo"></a>
                    </div>
                    <div class="header-category-menu d-none d-xl-block">
                        <a href="#" class="header-category-toggle">
                            <div class="header-category-toggle__icon">
                                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                        <path d="M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18 C0.8954305,18 0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14 11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,16 C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16 C18,17.1045695 17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16 C14,14.8954305 14.8954305,14 16,14 Z M2,7 C3.1045695,7 4,7.8954305 4,9 C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695 0,9 C0,7.8954305 0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695 10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z M16,7 C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11 C14.8954305,11 14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0 C3.1045695,0 4,0.8954305 4,2 C4,3.1045695 3.1045695,4 2,4 C0.8954305,4 0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z M9,0 C10.1045695,0 11,0.8954305 11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695 7,2 C7,0.8954305 7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695 17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0 16,0 Z"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="header-category-toggle__text">Category</div>
                        </a>
                        <div class="header-category-dropdown-wrap">
                            <ul class="header-category-dropdown">
                                @forelse ($categories as $category)
                                <li>
                                    <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                                    @if ($category->subcategories->count())
                                    <ul class="sub-categories children">
                                        @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <a href="{{ route('subcategory.show', $subcategory->id) }}">{{ $subcategory->name }}
                                                <span class="toggle-sub-menu"></span>
                                            </a>
                                            @if ($subcategory->courses->count())
                                            <ul class="course-list children">
                                                @foreach ($subcategory->courses as $course)
                                                <li>
                                                    <a class="categories-course" href="{{ route('course.show', $course->id) }}">
                                                        <div class="categories-course__thumbnail">
                                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $category->name }} - {{ $subcategory->name }} - {{ $course->title }}" width="62" height="50" loading="lazy">
                                                        </div>
                                                        <div class="categories-course__caption">
                                                            <h5 class="categories-course__title">{{ $course->title }}</h5>
                                                            <div class="categories-course__price">
                                                                <span class="categories-course__sale-price">${{ number_format($course->sale_price, 2) }}</span>
                                                                @if ($course->mrp > $course->sale_price)
                                                                <span class="categories-course__regular-price">${{ number_format($course->mrp, 2) }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @empty
                                <li><a href="#">No categories available</a></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="header-inner">
                        <div class="header-serach">
                            <form action="{{ route('courses.search') }}" method="GET">
                                <input type="text" name="search" class="header-serach__input" placeholder="Search courses..." value="{{ request('search') }}">
                                <button type="submit" class="header-serach__btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="header-navigation d-none d-xl-block">
                            <nav class="menu-primary">
                                <ul class="menu-primary__container">
                                    <li><a class="active" href="{{url('/')}}"><span>Home</span></a></li>
                                    <li><a href="{{route('about')}}"><span>About Us</span></a></li>
                                    <li><a href="{{route('all_course')}}"><span>Courses</span></a></li>
                                    <li><a href="{{route('blogs')}}"><span>Blog</span></a></li>
                                    <li><a href="{{route('contact')}}"><span>Contact Us</span></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-action">
                            <a href="{{ route('cart.view') }}" class="header-action__btn">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="header-action__number">{{ $cartCount }}</span>
                            </a>
                            <div class="header-mini-cart">
                                @if ($cartItems->isEmpty())
                                <p class="text-center">Your cart is empty.</p>
                                @else
                                <ul class="header-mini-cart__product-list">
                                    @foreach ($cartItems as $item)
                                    <li class="header-mini-cart__item" data-cart-item-id="{{ $item->id }}">
                                        <form action="{{ route('cart.delete', $item->id) }}" method="POST" class="cart-remove-form">
                                            @csrf
                                            <button type="submit" class="header-mini-cart__close"></button>
                                        </form>
                                        <div class="header-mini-cart__thumbnail">
                                            <a href="{{ url('/courses/' . $item->course->id) }}">
                                                @if ($item->course->thumbnail)
                                                <img src="{{ asset('' . $item->course->thumbnail) }}" alt="{{ $item->course->title }}" width="80" height="93">
                                                @else
                                                <img src="{{ asset('images/placeholder.png') }}" alt="No Image" width="80" height="93">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="header-mini-cart__caption">
                                            <h3 class="header-mini-cart__name">
                                                <a href="{{ url('/courses/' . $item->course->id) }}">{{ $item->course->title }}</a>
                                            </h3>
                                            <span class="header-mini-cart__quantity">
                                                1 × <strong class="amount">₹{{ number_format($item->course->sale_price, 2) }}</strong>
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="header-mini-cart__footer">
                                    <div class="header-mini-cart__total">
                                        <p class="header-mini-cart__label">Total:</p>
                                        <p class="header-mini-cart__value">
                                            ₹{{ number_format($cartItems->sum(fn($item) => $item->course->sale_price), 2) }}
                                        </p>
                                    </div>
                                    <div class="header-mini-cart__btn">
                                        <a href="{{ route('cart.view') }}" class="btn btn-primary btn-hover-secondary">View cart</a>
                                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-hover-secondary">Checkout</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="header-toggle">
                            <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                            <button class="header-toggle__btn search-open d-flex d-md-none">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu" style="background-image: url({{ asset('front/assets/images/mobile-bg.jpg') }})">
            <div class="offcanvas-header bg-white">
                <div class="offcanvas-logo">
                    <a class="offcanvas-logo__logo" href="{{url('/')}}"><img src="{{ asset('front/assets/images/careercracker.png') }}" alt="Logo"></a>
                </div>
                <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <nav class="canvas-menu">
                    <ul class="offcanvas-menu">
                        <li><a class="active" href="{{url('/')}}"><span>Home</span></a></li>
                        <li><a href="{{route('about')}}"><span>About Us</span></a></li>
                        <li><a href="{{route('all_course')}}"><span>Courses</span></a></li>
                        <li><a href="{{route('blogs')}}"><span>Blog</span></a></li>
                        <li><a href="{{route('contact')}}"><span>Contact Us</span></a></li>
                    </ul>
                </nav>
            </div>
            <div class="offcanvas-user d-block d-lg-none">
                @guest
                <div class="offcanvas-user__button mb-3">
                    <a href="{{route('login')}}" class="btn btn-secondary w-100">Log in </a>
                </div>
                @endguest
                @auth
                <div class="offcanvas-user__button">
                    <div class="dropdown w-100">
                        <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="mobileProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="mobileProfileDropdown">
                            <li><a class="dropdown-item" href="{{ route('student.dashboard') }}">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
</main>

<!-- Log In Modal Start -->
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-form">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-form py-4">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                        </div>
                        <div class="text-end py-2">
                            <a class="modal-form__link" href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Log In Modal End -->

<!-- Register Modal Start -->
<div class="modal fade" id="registerModal">
    <div class="modal-dialog modal-dialog-centered modal-register">
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Sign Up</h5>
                    <p class="modal-description"></p>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Name <span style="color:red;">*</span></label>
                                    <input type="text" name="name" class="form-control1" placeholder="Your name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="nameError"></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Email <span style="color:red;">*</span></label>
                                    <input type="email" name="email" class="form-control1" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="text-danger" id="emailError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="emailError"></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Password <span style="color:red;">*</span></label>
                                    <input type="password" name="password" class="form-control1" placeholder="Password" required>
                                    @error('password')
                                    <span class="text-danger" id="passwordError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="passwordError"></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Password Confirmation <span style="color:red;">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control1" placeholder="Confirm Password" required>
                                    @error('password_confirmation')
                                    <span class="text-danger" id="password_confirmationError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="password_confirmationError"></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form">
                                    <label class="form-label">Contact No <span style="color:red;">*</span></label>
                                    <input type="tel" name="contact_no" class="form-control1" placeholder="Enter Contact No" value="{{ old('contact_no') }}" required>
                                    @error('contact_no')
                                    <span class="text-danger" id="contact_noError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="contact_noError"></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form form-check">
                                    <input type="checkbox" name="show_terms" id="showTerms" class="form-check-input" required>
                                    <label for="showTerms">View Terms and Privacy Policy</label>
                                    @error('show_terms')
                                    <span class="text-danger" id="show_termsError">{{ $message }}</span>
                                    @else
                                    <span class="text-danger" id="show_termsError"></span>
                                    @enderror
                                </div>
                                <div id="termsContent" class="mt-3" style="display: none;">
                                    <h6><span class="orange">Terms & Conditions</span> of taking Service from Career Cracker Academy</h6>
                                    <p>
                                        This website is operated by <strong>Career Cracker</strong>. Throughout the site, the terms "we," "us," and "our" refer to Career Cracker.
                                        Career Cracker offers this website, including all information, tools, and services available from this site to you, the user,
                                        conditioned upon your acceptance of all terms, conditions, policies, and notices stated here.
                                    </p>
                                    <p>
                                        By visiting our site and/or purchasing something from us, you engage in our "Service" and agree to be bound by the following
                                        terms and conditions ("Terms of Service," "Terms"), including any additional terms and conditions and policies referenced herein
                                        and/or available by hyperlink. These Terms of Service apply to all users of the site, including, without limitation, users who
                                        are browsers, vendors, customers, merchants, and/or contributors of content.
                                    </p>
                                    <p>
                                        Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site,
                                        you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then
                                        you may not access the website or use any of the services. If these Terms of Service are considered an offer, acceptance is
                                        expressly limited to these Terms of Service.
                                    </p>
                                    <hr class="my-4">
                                    <h4 class="mb-3">Prohibited Uses</h4>
                                    <p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content:</p>
                                    <ul class="list-unstyled ms-3">
                                        <li>• For any unlawful purpose;</li>
                                        <li>• To solicit others to perform or participate in any unlawful acts;</li>
                                        <li>• To violate any international, federal, provincial, or state regulations, rules, laws, or local ordinances;</li>
                                        <li>• To infringe upon or violate our intellectual property rights or the intellectual property rights of others;</li>
                                        <li>• To harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability;</li>
                                        <li>• To submit false or misleading information;</li>
                                        <li>• To upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or any related website, other websites, or the Internet;</li>
                                        <li>• To collect or track the personal information of others;</li>
                                        <li>• To spam, phish, pharm, pretext, spider, crawl, or scrape;</li>
                                        <li>• For any obscene or immoral purpose;</li>
                                        <li>• To interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet.</li>
                                    </ul>
                                    <p class="mt-3">
                                        We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.
                                    </p>
                                    <hr class="my-4">
                                    <h4 class="mb-3">Contact Information</h4>
                                    <p> Questions about the Terms of Service should be sent to us at <b>info.careercracker@gmail.com</b> </p>
                                    <p>By clicking 'I Agree,' you confirm that you have read and accepted the Terms and Conditions, including any additional provisions outlined on the Terms & Conditions page of the Career Cracker website.</p>
                                    <div class="modal-form form-check">
                                        <input type="checkbox" name="terms_accepted" id="termsAccepted" class="form-check-input" required>
                                        <label for="termsAccepted">I agree to the Terms and Privacy Policy</label>
                                        @error('terms_accepted')
                                        <span class="text-danger" id="terms_acceptedError">{{ $message }}</span>
                                        @else
                                        <span class="text-danger" id="terms_acceptedError"></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form">
                                    <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="otpForm" class="d-none" method="POST">
                        @csrf
                        <input type="hidden" name="email" id="otpEmail">
                        <input type="hidden" name="terms_accepted" id="otpTermsAccepted" value="true">
                        <div class="modal-form">
                            <label class="form-label">Enter OTP <span style="color:red;">*</span></label>
                            <input type="text" name="otp" class="form-control1" placeholder="Enter OTP" required>
                            @error('otp')
                            <span class="text-danger" id="otpError">{{ $message }}</span>
                            @else
                            <span class="text-danger" id="otpError"></span>
                            @enderror
                        </div>
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Verify OTP</button>
                        </div>
                        <div class="modal-form text-center">
                            <a href="#" id="resendOtp">Resend OTP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal End -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Terms and Conditions Toggle
        const registerModal = document.getElementById('registerModal');
        if (registerModal) {
            registerModal.addEventListener('shown.bs.modal', function() {
                const showTermsCheckbox = document.getElementById('showTerms');
                const termsContent = document.getElementById('termsContent');
                console.log('Modal shown, showTermsCheckbox:', showTermsCheckbox);
                console.log('Modal shown, termsContent:', termsContent);
                if (showTermsCheckbox && termsContent) {
                    showTermsCheckbox.addEventListener('change', function() {
                        console.log('Checkbox changed, checked:', this.checked);
                        termsContent.classList.toggle('show', this.checked);
                        const termsAcceptedCheckbox = document.getElementById('termsAccepted');
                        if (termsAcceptedCheckbox && !this.checked) {
                            termsAcceptedCheckbox.checked = false;
                        }
                    });
                } else {
                    console.error('showTermsCheckbox or termsContent not found in modal');
                }
            });
        }

        // Cart Item Removal
        document.querySelectorAll('.header-mini-cart__close').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.cart-remove-form');
                const cartItem = this.closest('.header-mini-cart__item');
                const cartItemId = cartItem.dataset.cartItemId;

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: new FormData(form),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        cartItem.remove();
                        const cartCountElement = document.querySelector('.header-action__number');
                        let cartCount = parseInt(cartCountElement.textContent);
                        cartCountElement.textContent = cartCount - 1;
                        const totalElement = document.querySelector('.header-mini-cart__value');
                        let currentTotal = parseFloat(totalElement.textContent.replace('₹', '').replace(',', ''));
                        const itemPrice = parseFloat(cartItem.querySelector('.amount').textContent.replace('₹', '').replace(',', ''));
                        totalElement.textContent = '₹' + (currentTotal - itemPrice).toFixed(2);
                        if (cartCount - 1 === 0) {
                            const miniCartList = document.querySelector('.header-mini-cart__product-list');
                            miniCartList.replaceWith(document.createElement('p')).textContent = 'Your cart is empty.';
                            document.querySelector('.header-mini-cart__footer').style.display = 'none';
                        }
                        alert(data.message);
                    } else {
                        alert(data.message || 'Failed to remove item.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the item.');
                });
            });
        });

        // Registration Form Submission
        const registerForm = document.getElementById('registerForm');
        const otpForm = document.getElementById('otpForm');
        if (registerForm) {
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(registerForm);

                // Clear previous errors
                ['nameError', 'emailError', 'passwordError', 'password_confirmationError', 'contact_noError', 'show_termsError', 'terms_acceptedError'].forEach(id => {
                    const errorElement = document.getElementById(id);
                    if (errorElement) errorElement.textContent = '';
                });

                fetch('{{ route("register") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Register Response Status:', response.status);
                    if (!response.ok) {
                        return response.json().then(errorData => {
                            throw errorData;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Register Response Data:', data);
                    const otpEmailInput = document.getElementById('otpEmail');
                    if (otpEmailInput && data.email) {
                        otpEmailInput.value = data.email;
                    } else {
                        console.warn('Email input or data.email missing');
                    }

                    if (otpForm && registerForm) {
                        otpForm.style.display = 'block';
                        otpForm.classList.remove('d-none');
                        registerForm.style.display = 'none';
                        registerForm.classList.add('d-none');
                        const registerModalLabel = document.getElementById('registerModalLabel');
                        const modalDescription = document.querySelector('.modal-description');
                        if (registerModalLabel) {
                            registerModalLabel.textContent = 'Verify OTP';
                        }
                        if (modalDescription) {
                            modalDescription.textContent = `An OTP has been sent to ${data.email || 'your email'}`;
                        }
                    } else {
                        console.error('otpForm or registerForm not found');
                        alert('Failed to display OTP form. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Registration Error:', error);
                    if (error.errors) {
                        const fieldMap = {
                            'name': 'nameError',
                            'email': 'emailError',
                            'password': 'passwordError',
                            'password_confirmation': 'password_confirmationError',
                            'contact_no': 'contact_noError',
                            'show_terms': 'show_termsError',
                            'terms_accepted': 'terms_acceptedError'
                        };
                        Object.keys(error.errors).forEach(key => {
                            const errorElementId = fieldMap[key];
                            const errorElement = document.getElementById(errorElementId);
                            if (errorElement) {
                                errorElement.textContent = error.errors[key][0];
                            }
                        });
                        if (error.errors.email && otpForm && registerForm) {
                            otpForm.style.display = 'none';
                            otpForm.classList.add('d-none');
                            registerForm.style.display = 'block';
                            registerForm.classList.remove('d-none');
                        }
                    } else {
                        alert('Registration failed: ' + (error.message || 'Please try again.'));
                    }
                });
            });
        }

        // OTP Form Submission
        if (otpForm) {
            otpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(otpForm);

                // Clear previous OTP error
                const otpError = document.getElementById('otpError');
                if (otpError) otpError.textContent = '';

                fetch('{{ route("otp.verify.post") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('OTP Response Status:', response.status);
                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        return response.text().then(text => {
                            console.error('Non-JSON Response:', text.substring(0, 100));
                            throw new Error('Received non-JSON response');
                        });
                    }
                    if (!response.ok) {
                        return response.json().then(errorData => {
                            throw errorData;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('OTP Response Data:', data);
                    const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
                    if (registerModal) {
                        registerModal.hide();
                    } else {
                        console.warn('registerModal not found');
                    }
                    window.location.assign('{{ url("/") }}');
                })
                .catch(error => {
                    console.error('OTP Verification Error:', error);
                    if (error.errors && error.errors.otp) {
                        if (otpError) otpError.textContent = error.errors.otp[0];
                    } else {
                        if (otpError) otpError.textContent = error.message || 'Verification failed. Please try again.';
                    }
                });
            });
        }

        // Resend OTP
        const resendOtpButton = document.getElementById('resendOtp');
        if (resendOtpButton) {
            resendOtpButton.addEventListener('click', function(e) {
                e.preventDefault();
                const email = document.getElementById('otpEmail')?.value;
                if (!email) {
                    alert('Email not found. Please try registering again.');
                    return;
                }

                fetch('{{ route("otp.resend") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email })
                })
                .then(response => {
                    console.log('Resend OTP Response Status:', response.status);
                    if (!response.ok) {
                        return response.json().then(errorData => {
                            throw errorData;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Resend OTP Response Data:', data);
                    alert(`OTP resent to ${email}`);
                })
                .catch(error => {
                    console.error('Resend OTP Error:', error);
                    const otpError = document.getElementById('otpError');
                    if (otpError && error.errors?.email) {
                        otpError.textContent = error.errors.email[0];
                    } else {
                        alert('Failed to resend OTP. Please try again.');
                    }
                });
            });
        }
    });
</script>
</body>
</html>