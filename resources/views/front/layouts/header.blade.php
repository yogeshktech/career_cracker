<main class="main-wrapper">
    <div class="header-section header-sticky">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="header-top-bar-wrap d-sm-flex justify-content-between align-items-center">
                    <div class="header-top-bar-wrap__info">
                        <ul class="header-top-bar-wrap__info-list">
                            <li><a href="tel:9867-679-600"><i class="fas fa-phone"></i> <span
                                        class="info-text">9867-679-600</span></a></li>
                            <li><a href="mailto:info@careercracker.in"><i class="far fa-envelope"></i> <span
                                        class="info-text">info@careercracker.in</span></a></li>
                        </ul>
                    </div>
                    <div class="header-top-bar-wrap__info d-sm-flex">
                        <ul class="header-top-bar-wrap__info-list d-none d-lg-flex">
                            @guest
                                <li><button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-link">Log
                                        in</button></li>
                                <li><button data-bs-toggle="modal" data-bs-target="#registerModal"
                                        class="btn btn-link">Register</button></li>
                            @endguest
                            @auth
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="profileDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Welcome To {{ Auth::user()->name }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                            <li>
                                                <a href="{{ route('student.dashboard') }}">Profile</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                        <ul class="header-top-bar-wrap__info-social">
                            <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="header-main-wrapper">
                    <div class="header-logo">
                        <a class="header-logo__logo" href="{{url('/')}}"><img
                                src="{{ asset("front/assets/images/careercracker.png")}}" width="296" height="64"
                                alt="Logo"></a>
                    </div>
                    <div class="header-category-menu d-none d-xl-block">
                        <a href="#" class="header-category-toggle">
                            <div class="header-category-toggle__icon">
                                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                        <path
                                            d="M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18 C0.8954305,18 0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14 11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,17.1045695 7,16 C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16 C18,17.1045695 17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16 C14,14.8954305 14.8954305,14 16,14 Z M2,7 C3.1045695,7 4,7.8954305 4,9 C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695 0,9 C0,7.8954305 0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695 10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z M16,7 C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11 C14.8954305,11 14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0 C3.1045695,0 4,0.8954305 4,2 C4,3.1045695 3.1045695,4 2,4 C0.8954305,4 0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z M9,0 C10.1045695,0 11,0.8954305 11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695 7,2 C7,0.8954305 7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695 17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0 16,0 Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="header-category-toggle__text">Category</div>
                        </a>
                        <div class="header-category-dropdown-wrap">
                        <ul class="header-category-dropdown">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#">{{ $category->name }} 
                                        @if ($category->subcategories->isNotEmpty())
                                            <span class="toggle-sub-menu"></span>
                                        @endif
                                    </a>
                                    @if ($category->subcategories->isNotEmpty())
                                        <ul class="sub-categories children">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="#">{{ $subcategory->name }}
                                                        @if ($subcategory->courses->isNotEmpty())
                                                            <span class="toggle-sub-menu"></span>
                                                        @endif
                                                    </a>
                                                    @if ($subcategory->courses->isNotEmpty())
                                                        <ul class="course-list children">
                                                            @foreach ($subcategory->courses as $course)
                                                                <li>
                                                                    <a class="categories-course" href="#">
                                                                        <div class="categories-course__thumbnail">
                                                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                                                                width="62" height="50">
                                                                        </div>
                                                                        <div class="categories-course__caption">
                                                                            <h5 class="categories-course__title">{{ $course->title }}</h5>
                                                                            <div class="categories-course__price">
                                                                                <span class="categories-course__sale-price">${{ number_format($course->sale_price, 2) }}</span>
                                                                                <span class="categories-course__regular-price">${{ number_format($course->regular_price, 2) }}</span>
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
                            @endforeach
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
                                    <li><a class="active" href="{{url('/')}}"><span>Home</span></a>
                                    </li>
                                    <li>
                                        <a href="{{route('about')}}"><span>About Us</span></a>

                                    </li>
                                    <li>
                                        <a href="{{route('all_course')}}"><span>Courses</span></a>

                                    </li>
                                    <li>
                                        <a href="{{route('blogs')}}"><span>Blog</span></a>

                                    </li>

                                    <li>
                                        <a href="{{route('contact')}}"><span>Contact Us</span></a>

                                    </li>
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
                                                <form action="{{ route('cart.delete', $item->id) }}" method="POST"
                                                    class="cart-remove-form">
                                                    @csrf
                                                    <button type="submit" class="header-mini-cart__close"></button>
                                                </form>
                                                <div class="header-mini-cart__thumbnail">
                                                    <a href="{{ url('/courses/' . $item->course->id) }}">
                                                        @if ($item->course->thumbnail)
                                                            <img src="{{ asset('' . $item->course->thumbnail) }}"
                                                                alt="{{ $item->course->title }}" width="80" height="93">
                                                        @else
                                                            <img src="{{ asset('images/placeholder.png') }}" alt="No Image"
                                                                width="80" height="93">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="header-mini-cart__caption">
                                                    <h3 class="header-mini-cart__name">
                                                        <a
                                                            href="{{ url('/courses/' . $item->course->id) }}">{{ $item->course->title }}</a>
                                                    </h3>
                                                    <span class="header-mini-cart__quantity">
                                                        1 × <strong
                                                            class="amount">₹{{ number_format($item->course->sale_price, 2) }}</strong>
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
                                            <a href="{{ route('cart.view') }}"
                                                class="btn btn-primary btn-hover-secondary">View cart</a>
                                            <a href="{{ route('checkout') }}"
                                                class="btn btn-primary btn-hover-secondary">Checkout</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <script>
                            document.querySelectorAll('.header-mini-cart__close').forEach(button => {
                                button.addEventListener('click', function (e) {
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
                        </script>
                        <div class="header-toggle">
                            <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasMobileMenu">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                            <button class="header-toggle__btn search-open d-flex d-md-none">
                                <span class="dots"></span>
                                <span class="dots"></span>
                                <span class="dots"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu"
            style="background-image: url({{ asset('front/assets/images/mobile-bg.jpg') }}">
            <div class="offcanvas-header bg-white">
                <div class="offcanvas-logo">
                    <a class="offcanvas-logo__logo" href="{{url('/')}}"><img
                            src="{{ asset('front/assets/images/careercracker.png') }}" alt="Logo"></a>
                </div>
                <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <nav class="canvas-menu">
                    <ul class="offcanvas-menu">
                        <li>
                            <a class="active" href="{{url('/')}}"><span>Home</span></a>
                        </li>
                        <li>
                            <a href="{{route('about')}}"><span>About Us</span></a>
                        </li>
                        <li>
                            <a href="{{route('all_course')}}"><span>Courses</span></a>
                        </li>
                        <li>
                            <a href="{{route('blogs')}}"><span>Blog</span></a>
                        </li>

                        <li>
                            <a href="{{route('contact')}}"><span>Contact Us</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="offcanvas-user d-lg-none">
                @guest
                    <div class="offcanvas-user__button">
                        <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Log In</button>
                    </div>
                    <div class="offcanvas-user__button">
                        <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Sign Up</button>
                    </div>
                @endguest
                @auth
                    <div class="offcanvas-user__button">
                        <div class="dropdown w-100">
                            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="mobileProfileDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="mobileProfileDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('student.dashboard') }}">Profile</a>
                                </li>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Log In Modal Start -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <p class="modal-description">Don't have an account yet? <button type="button" data-bs-toggle="modal"
                            data-bs-target="#registerModal" data-bs-dismiss="modal">Sign up for free</button></p>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your email"
                                value="{{ old('email') }}" required>
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
                        <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                        
                            <input type="checkbox" name="remember" id="rememberme">
                            <label for="rememberme">Remember me</label>
                        </div>
                        <div class="text-end">
                            <a class="modal-form__link" href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                </div>
                <div class="modal-form">
                    <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Log In Modal End -->

<!-- Register Modal Start -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-register">
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Sign Up</h5>
                    <p class="modal-description">Already have an account? <button type="button" data-bs-toggle="modal"
                            data-bs-target="#loginModal" data-bs-dismiss="modal">Log in</button></p>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="POST">
                        @csrf
                        <div class="row gy-5">
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your name"
                                        value="{{ old('name') }}" required>
                                    <span class="text-danger" id="nameError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}" required>
                                    <span class="text-danger" id="emailError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                    <span class="text-danger" id="passwordError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-form">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form">
                                    <label class="form-label">Contact No</label>
                                    <input type="tel" name="contact_no" class="form-control"
                                        placeholder="Enter Contact No" value="{{ old('contact_no') }}">
                                    <span class="text-danger" id="contactNoError"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form form-check">
                                    <input type="checkbox" name="terms" id="privacy" required>
                                    <label for="privacy">Accept the <a href="#">Terms and Privacy Policy</a></label>
                                    <span class="text-danger" id="termsError"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-form">
                                    <button type="submit"
                                        class="btn btn-primary btn-hover-secondary w-100">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="otpForm" style="display: none;" method="POST">
                        @csrf
                        <input type="hidden" name="email" id="otpEmail">
                        <div class="modal-form">
                            <label class="form-label">Enter OTP</label>
                            <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
                            <span class="text-danger" id="otpError"></span>
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

<!-- JavaScript for Form Switching and AJAX -->
<script>
    $(document).ready(function () {
        // Handle Registration Form Submission
        $('#registerForm').on('submit', function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            // Clear previous errors
            $('#nameError, #emailError, #passwordError, #contactNoError, #termsError').text('');

            $.ajax({
                url: '{{ route("register") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Store email for OTP form
                    $('#otpEmail').val(response.email);
                    // Switch to OTP form
                    $('#registerForm').hide();
                    $('#otpForm').show();
                    $('#registerModalLabel').text('Verify OTP');
                    $('.modal-description').text('An OTP has been sent to ' + response.email);
                },
                error: function (xhr) {
                    const errors = xhr.responseJSON.errors;
                    if (errors) {
                        $('#nameError').text(errors.name || '');
                        $('#emailError').text(errors.email || '');
                        $('#passwordError').text(errors.password || '');
                        $('#contactNoError').text(errors.contact_no || '');
                        $('#termsError').text(errors.terms || '');
                    }
                }
            });
        });

        // Handle OTP Form Submission
        $('#otpForm').on('submit', function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            // Clear previous OTP error
            $('#otpError').text('');

            $.ajax({
                url: '{{ route("otp.verify.post") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Close modal and redirect to dashboard
                    $('#registerModal').modal('hide');
                    window.location.href = '{{ url("/") }}';
                },
                error: function (xhr) {
                    const errors = xhr.responseJSON.errors;
                    if (errors && errors.otp) {
                        $('#otpError').text(errors.otp);
                    } else {
                        $('#otpError').text('An error occurred. Please try again.');
                    }
                }
            });
        });

        // Handle Resend OTP
        $('#resendOtp').on('click', function (e) {
            e.preventDefault();
            const email = $('#otpEmail').val();

            $.ajax({
                url: '{{ route("otp.resend") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email
                },
                success: function (response) {
                    alert('OTP resent to ' + email);
                },
                error: function (xhr) {
                    alert('Failed to resend OTP. Please try again.');
                }
            });
        });
    });
</script>