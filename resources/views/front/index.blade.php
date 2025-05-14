@extends('front.layouts.layout')
@section('content')
    <!-- Slider Section Start -->
    <div class="slider-section slider-section-04 ">
        <div class="slider-wrapper " style="background-image: url({{ asset('front/assets/images/main-hero-img.jpg') }}">
            <div class="container ">

                <div class="row gy-10 align-items-center">
                    <div class="col-lg-6">
                        <!-- Slider Caption Start -->
                        <div class="slider-caption-04" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="slider-caption-04__main-title">Unlock Your Potential</h2>

                            <h4 class="slider-caption-04__sub-title">
                                Launch your IT career with CareerCracker - no fees until you're hired!
                            </h4>

                            <div class="d-flex gap-3 mt-3">
                                <a href="{{route('all_course')}}"
                                    class="slider-caption-04__btn btn btn-orange rounded-button">View All
                                    Courses</a>
                                {{-- <a href="" class="slider-caption-04__btn btn btn-orangee rounded-button">Enroll Now</a>
                                --}}
                            </div>
                        </div>


                        <!-- Slider Caption End -->
                    </div>
                    <div class="col-lg-6  ">

                        <!-- Slider Register Form Start -->
                        <div class="slider-register__box text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h4 class="slider-register__title">Register for A Free Account <br> To Access To
                                <span>1200+</span> Online Courses
                            </h4>

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('enquiry_send') }}" method="POST">
                                @csrf
                                <div class="slider-register__form">
                                    <div class="slider-register__input">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="slider-register__input">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Your Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="slider-register__input">
                                        <i class="fas fa-phone"></i>
                                        <input type="tel" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Contact No" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="slider-register__input">
                                        <i class="fas fa-comment"></i>
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Enter Your Message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="slider-register__btn">
                                        <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Submit
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Slider Register Form End -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Slider Section End -->





    <!-- Page Banner Section Start -->
    <div class="page-banner">


        <div class="">


            <!-- About Section Start -->
            <div class="about-section section-padding-01">
                <div class="container custom-container">

                    <div class="about-title">
                        <!-- Section Title Start -->
                        <div class="section-title mb-0" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="section-title__title-03">Our Philosophy</h2>
                            <p>At Career Cracker, we believe in making exceptional careers accessible to
                                everyone, without financial barriers. We are committed to empowering
                                individuals through quality education and practical, in-demand skills.
                                More than just an academy...</p>

                            <a href="{{route('about')}}"><button class="btn btn-orange rounded-button mt-3">Read
                                    More</button>
                        </div></a>
                        <!-- Section Title End -->
                    </div>

                    <!-- About Image Start -->
                    <div class="about-image scene">
                        <div class="about-image__image" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('front/assets/images/about-us-02-introduce-image.png') }}" alt="About"
                                width="1171" height="619">
                        </div>

                        <div class="about-image-widget" data-aos="zoom-in-left" data-aos-duration="1000"
                            data-aos-delay="1000">
                            <div class="about-image-widget__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 48 53">
                                    <g fill-rule="nonzero">
                                        <path
                                            d="M46.2977393,23.4211436 C45.3957447,23.4211436 44.6636968,22.6890957 44.6636968,21.787101 C44.6636968,15.5297872 42.2281915,9.64946809 37.8051861,5.22446809 C37.1668883,4.58617021 37.1668883,3.55132984 37.8051861,2.91303197 C38.443484,2.27473409 39.4783245,2.27473409 40.1170213,2.91303197 C45.156383,7.95438832 47.9317819,14.6585106 47.9317819,21.787101 C47.9317819,22.6890957 47.199734,23.4211436 46.2977393,23.4211436 L46.2977393,23.4211436 Z">
                                        </path>
                                        <path
                                            d="M1.63404255,23.4211436 C0.732047898,23.4211436 0,22.6890957 0,21.787101 C0,14.6585106 2.77579792,7.95438832 7.81715428,2.91502662 C8.45545215,2.27672875 9.49069154,2.27672875 10.1289894,2.91502662 C10.7672873,3.55332449 10.7672873,4.58856388 10.1289894,5.22686175 C5.70398931,9.64946809 3.26808511,15.5297872 3.26808511,21.787101 C3.26808511,22.6890957 2.53603721,23.4211436 1.63404255,23.4211436 Z">
                                        </path>
                                        <path
                                            d="M23.9660905,52.2893617 C19.4605053,52.2893617 15.7958777,48.6247341 15.7958777,44.1191489 C15.7958777,43.2171543 16.5279256,42.4851064 17.4299202,42.4851064 C18.3319149,42.4851064 19.0639628,43.2171543 19.0639628,44.1191489 C19.0639628,46.8231382 21.262101,49.0212766 23.9660905,49.0212766 C26.6696809,49.0212766 28.8682181,46.8231382 28.8682181,44.1191489 C28.8682181,43.2171543 29.600266,42.4851064 30.5022607,42.4851064 C31.4042553,42.4851064 32.1363032,43.2171543 32.1363032,44.1191489 C32.1363032,48.6247341 28.4716755,52.2893617 23.9660905,52.2893617 L23.9660905,52.2893617 Z">
                                        </path>
                                        <path
                                            d="M41.9405585,45.7531915 L5.99162237,45.7531915 C3.88882979,45.7531915 2.1785904,44.0429521 2.1785904,41.9405585 C2.1785904,40.8247341 2.66449471,39.7683511 3.51223404,39.0426862 C6.82579792,36.2429521 8.71476061,32.1734043 8.71476061,27.8617021 L8.71476061,21.787101 C8.71476061,13.3775266 15.556117,6.53617021 23.9660905,6.53617021 C32.3756649,6.53617021 39.2170213,13.3775266 39.2170213,21.787101 L39.2170213,27.8617021 C39.2170213,32.1734043 41.1059841,36.2429521 44.3980053,39.0275266 C45.2672873,39.7683511 45.7531915,40.8247341 45.7531915,41.9405585 C45.7531915,44.0429521 44.0429521,45.7531915 41.9405585,45.7531915 Z M23.9660905,9.80425532 C17.3577128,9.80425532 11.9828457,15.1791223 11.9828457,21.787101 L11.9828457,27.8617021 C11.9828457,33.1360372 9.6714096,38.1167553 5.6429521,41.5220744 C5.56675527,41.5875001 5.44667551,41.7227393 5.44667551,41.9405585 C5.44667551,42.2365691 5.69521277,42.4851064 5.99162237,42.4851064 L41.9405585,42.4851064 C42.2365691,42.4851064 42.4851064,42.2365691 42.4851064,41.9405585 C42.4851064,41.7227393 42.3654255,41.5875001 42.2932181,41.5264627 C38.2603723,38.1167553 35.9489362,33.1360372 35.9489362,27.8617021 L35.9489362,21.787101 C35.9489362,15.1791223 30.5740692,9.80425532 23.9660905,9.80425532 Z">
                                        </path>
                                        <path
                                            d="M23.9660905,9.80425532 C23.0640958,9.80425532 22.3320479,9.07220742 22.3320479,8.17021277 L22.3320479,1.63404255 C22.3320479,0.732047898 23.0640958,0 23.9660905,0 C24.8680851,0 25.600133,0.732047898 25.600133,1.63404255 L25.600133,8.17021277 C25.600133,9.07220742 24.8680851,9.80425532 23.9660905,9.80425532 Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="about-image-widget__caption">
                                <h4 class="about-image-widget__title">Tomorrow is our <strong>"When I Grow Up" Spirit
                                        Day!</strong></h4>
                            </div>
                        </div>

                        <img class="about-image__shape-01" data-depth="-0.5"
                            src="{{ asset('front/assets/images/shape/edumall-shape-01.png') }}" alt="Shape" width="179"
                            height="178">
                        <img class="about-image__shape-02" data-depth="-0.5"
                            src="{{ asset('front/assets/images/shape/edumall-shape-grid-dots.png') }}" alt="Shape"
                            width="417" height="371">

                    </div>
                    <!-- About Image End -->

                </div>
            </div>
            <!-- About Section End -->

        </div>

        <div class="about-section__shape-01" data-depth="0.4"></div>
        <div class="about-section__shape-02" data-depth="-0.4"></div>


    </div>
    <!-- Page Banner Section End -->



    <!-- COunter start -->


    <section class="hero-section" style="background-image: url('{{ asset('front/assets/images/counter.jpg') }} ">
        <div class="overlay ">
            <div class="container">
                <div class="row align-items-center ">
                    <!-- Left side: Heading + Content -->
                    <div class="col-md-6 mb-4 mb-md-0">
                        <h1 class="display-6 fw-bold text-white">Proof is in the Numbers</h1>
                        <p class="lead">A trusted tech partner for accelerating growth &
                            future-readiness using next-gen services
                            and solutions.</p>
                    </div>

                    <!-- Right side: 2x2 Counter Grid -->
                    <div class="col-md-6">
                        <div class="row text-center g-4">
                            <!-- Top Row -->
                            <div class="col-6">
                                <div class="counter" data-target="20" data-label="20k">0</div>
                                <div class="counter-label">Total Clients</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="89" data-label="89k">0</div>
                                <div class="counter-label">Total Clients</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="208" data-label="208k">0</div>
                                <div class="counter-label">Total Clients</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="100" data-label="100k">0</div>
                                <div class="counter-label">Total Clients</div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>


    <!-- COunter end -->



    <!-- services start -->
    <div class="container py-5 text-center">
        <div class="row mt-5 mb-6 g-4">
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5 class="fs-3">Our Value</h3>
                        <p class="py-2">At CareerCracker, we value integrity, excellence, and a commitment to lifelong
                            learning. We believe
                            that education should be accessible to all and strive to create an inclusive and welcoming
                            environment for our students.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5 class="fs-3">Our services</h5>
                    <p class="py-2">We offer a wide range of services to support students at all levels, including academic
                        tutoring,
                        interview preparation, placement help and more. Our services are tailored to the unique needs of
                        each student to ensure the best possible outcomes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5 class="fs-3">Our Approach</h5>
                    <p class="py-2">We take a holistic approach to education, recognizing that academic success is just one
                        aspect of a
                        fulfilling life. We work closely with our students to identify their goals and aspirations, and to
                        develop the skills and mindset needed to achieve them.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- services end -->









    <!-- Categories Section Start -->
    <div class="categories-section bg-color-03 section-padding-01">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03"><span class="orange">Subject</span> Areas </h2>
            </div>
            <div class="row g-6">
                @foreach ($courses as $course)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                            <a class="categories-item-02__link" href="{{ route('courses.show', $course->id) }}">
                                <div class="categories-item-02__icon">
                                    <img style="width:40px;" src="{{ asset($course->thumbnail) }}" alt="">
                                </div>
                                <div class="categories-item-02__info">
                                    <h4 class="categories-item-02__name">{{$course->title}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Categories Section End -->























    <!-- Course Section Start -->
    <div class="courses-section section-padding-02">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-03"><span class="orange">Our</span> Courses</h2>
                    </div>
                </div>
            </div>

            <div class="tab-content course-tab-active swiper-button-style mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-pane fade show active" id="tab1">

                    <!-- Swiper Container -->
                    <div class="swiper course-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($courses as $course)
                                <div class="swiper-slide">
                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail">
                                                <a href="{{ route('courses.show', $course->id) }}">
                                                    <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                                        width="258" height="173">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            {{-- <span class="course-info__badge-text badge-all">{{ $course->level }}</span>
                                            --}}
                                            <h3 class="course-info__title">
                                                <a
                                                    href="{{ route('courses.show', $course->id) }}"><b>{{ $course->title }}</b></a>
                                            </h3>
                                            {{-- <a href="#" class="course-info__instructor">{{ $course->instructor ?? '' }}</a> --}}
                                            <div class="course-info__price">
                                                <span class="sale-price">₹{{ number_format($course->sale_price, 2) }}</span>
                                            </div>
                                            <div class="course-info__rating">
                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: {{ $course->rating ?? 80 }}%;">
                                                    </div>
                                                </div>
                                                <span>({{ $course->reviews_count ?? 2 }})</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->
                                </div>
                            @endforeach
                        </div>
                        <!-- Navigation Arrows -->
                        <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
                        <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Course Section End -->























    <!-- Testimonial Start -->
    <div class="testimonial-section bg-color-01 section-padding-01 scene">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03"><span class="orange">People Say About</span> Career Cracker</h2>
            </div>
            <div class="testimonial-active-02" data-aos="fade-up" data-aos-duration="1000">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item bg-white">
                                    <div class="testimonial-quote-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px"
                                            viewBox="0 0 50 40">
                                            <path
                                                d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                                            </path>
                                            <path
                                                d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016  ((*50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="testimonial-main-content">
                                        <div class="testimonial-caption">
                                            <h3 class="testimonial-caption__title">{{ $testimonial->title }}</h3>
                                            <p>{!! $testimonial->content !!}</p>
                                        </div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info__image">
                                                <img src="{{ asset($testimonial->image) }}" alt="Avatar" width="60" height="60">
                                            </div>
                                            <div class="testimonial-info__caption">
                                                <h5 class="testimonial-info__name">{{ $testimonial->name }}</h5>
                                                <p class="testimonial-info__designation">/ {{ $testimonial->designation }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}


                </div>
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const swiper = new Swiper('.testimonial-slider', {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            loop: true,
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            breakpoints: {
                                768: {
                                    slidesPerView: 2,
                                },
                                992: {
                                    slidesPerView: 3,
                                },
                            },
                        });
                    });
                </script>
            </div>
            <!-- Testimonial End -->

        </div>

        <div class="testimonial-section__shape-01" data-depth="-0.5"></div>
        <div class="testimonial-section__shape-02" data-depth="0.7"></div>
        <div class="testimonial-section__shape-03" data-depth="-0.5"></div>
        <img class="testimonial-section__shape-04" data-depth="0.7"
            src="{{ asset("front/assets/images/shape/edumall-shape-01.png") }}" alt="Shape" width="179" height="178">

    </div>
    <!-- Testimonial End -->


    <!-- additonal section start -->
    <!-- Campus Life Start -->
    <div class="campus-section section-padding-02">
        <div class="container ">

            <div class="row">
                <div class="col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-03"><span class="orange">Campus</span> Life</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

            </div>

            <div class="campus-wrapper scene">
                <div class="campus">
                    <div class="row gy-6 flex-row-reverse align-items-center">

                        <div class="col-md-6">
                            <!-- Campus Image Start -->
                            <div class="campus-image">
                                <div class="campus-image__image" data-aos="fade-up" data-aos-duration="1000">
                                    <img src="{{ asset("front/assets/images/home-university-image-campus-life.jpg")}}"
                                        alt="Campus" width="570" height="399">
                                </div>
                            </div>
                            <!-- Campus Image End -->
                        </div>

                        <div class="col-md-6">

                            <!-- Campus Widget Start -->
                            <div class="campus-widget">

                                <!-- Campus Widget Item Start -->
                                <div class="campus-widget-item" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="campus-widget-item__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512"
                                            height="512">
                                            <g fill="#000000">
                                                <path
                                                    d="M314,264a7,7,0,0,0-7-7H248.293a20.8,20.8,0,0,0-19.448-13.855,20.5,20.5,0,0,0-6.629,1.053l-56.1-79.035a6.993,6.993,0,1,0-11.414,8.083L211.263,252.9a20.617,20.617,0,0,0-3.106,10.872,20.837,20.837,0,0,0,20.688,20.855A20.6,20.6,0,0,0,248.293,271H307A7,7,0,0,0,314,264Zm-85.155,6.507a6.74,6.74,0,1,1,6.687-6.739A6.722,6.722,0,0,1,228.845,270.507Z">
                                                </path>
                                                <path
                                                    d="M486.523,373.832a29.635,29.635,0,0,1-9.288-10.392c-6.668-13.06-14.617-35.248-14.617-66.778,0-19.295-8.146-38.852-22.267-53.659-1.072-1.124-2.351-2.2-3.351-3.25V238.1a7.029,7.029,0,0,0-.007-.871A210.431,210.431,0,0,0,318.4,73.258a209.583,209.583,0,0,0-179.114,0A210.6,210.6,0,0,0,19,263.768C19,379.9,113.135,474.376,228.844,474.376a208.7,208.7,0,0,0,135.921-50.159,28.333,28.333,0,0,0,51.2-17.021,31.025,31.025,0,0,0-.173-3.2H476.06A16.822,16.822,0,0,0,493,387.241c0-3.556-1.19-8.48-4.52-11.811A15.325,15.325,0,0,0,486.523,373.832ZM228.845,460.376C120.855,460.376,33,372.178,33,263.768A196.6,196.6,0,0,1,145.286,85.9a195.609,195.609,0,0,1,167.121,0A196.538,196.538,0,0,1,421.525,228.4a74.054,74.054,0,0,0-13.164-5.733,25.7,25.7,0,0,0-20.169-40.74,180.42,180.42,0,0,0-82.956-80.64,178.8,178.8,0,0,0-152.779,0A179.622,179.622,0,0,0,49.868,263.768c0,99.044,80.288,179.49,178.977,179.49,40.44,0,79.959-13.258,111.5-39.258h19.046a30.74,30.74,0,0,0-.172,3.175,30.122,30.122,0,0,0,.159,3.079A194.846,194.846,0,0,1,228.845,460.376ZM387.594,219.319l-.062,0a11.638,11.638,0,1,1,.123,0ZM299.127,404H316.2c-26.051,17-56.409,25.258-87.351,25.258-90.969,0-164.977-74.232-164.977-165.557A164.937,164.937,0,0,1,299.235,113.929a166.4,166.4,0,0,1,75.1,71.692,25.715,25.715,0,0,0-7.507,37.042A77.389,77.389,0,0,0,334.789,243c-14.121,14.8-22.221,34.36-22.221,53.655,0,35.693-10.235,58.866-16.337,69.5a25.226,25.226,0,0,1-7.243,7.7,15.35,15.35,0,0,0-1.85,1.57,16.53,16.53,0,0,0-4.95,11.817A16.821,16.821,0,0,0,299.127,404Zm102.838,3.2a14.373,14.373,0,1,1-28.743-.055,15.854,15.854,0,0,1,.316-3.141h28.109A16.264,16.264,0,0,1,401.965,407.2Zm74.1-17.2H299.127a2.777,2.777,0,0,1-2.939-2.759,2.689,2.689,0,0,1,.862-2,.526.526,0,0,0,.154-.089A39.029,39.029,0,0,0,308.376,373.1c6.794-11.843,18.192-37.519,18.192-76.458,0-33.116,29.034-63.272,60.937-63.328.029,0,.059,0,.089,0h.089c31.9.056,60.935,30.22,60.935,63.341,0,34.313,8.781,58.716,16.149,73.143a43.419,43.419,0,0,0,13.557,15.374,1.941,1.941,0,0,1,.17.135,4.29,4.29,0,0,1,.506,1.927A2.777,2.777,0,0,1,476.06,390Z">
                                                </path>
                                                <path
                                                    d="M228,139.275a7,7,0,0,0,7-7V111.2a7,7,0,0,0-14,0v21.079A7,7,0,0,0,228,139.275Z">
                                                </path>
                                                <path
                                                    d="M228,389.264a7,7,0,0,0-7,7v21.079a7,7,0,1,0,14,0V396.264A7,7,0,0,0,228,389.264Z">
                                                </path>
                                                <path d="M96,258H76a7,7,0,0,0,0,14H96a7,7,0,0,0,0-14Z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="campus-widget-item__content">
                                        <h3 class="campus-widget-item__title"><a href="#">Student Life</a></h3>
                                        <p>This is a valuable period where you learn and grow. School life can be tiring but
                                            it sets the foundation for your whole life.</p>
                                    </div>
                                </div>
                                <!-- Campus Widget Item End -->

                                <!-- Campus Widget Item Start -->
                                <div class="campus-widget-item" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="campus-widget-item__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512"
                                            width="512">
                                            <g fill="#000000">
                                                <path
                                                    d="m370.274 407.522a6 6 0 0 0 6-6v-74.11a6 6 0 1 0 -12 0v74.11a6 6 0 0 0 6 6z">
                                                </path>
                                                <path
                                                    d="m370.274 303.443a6 6 0 0 0 6-6v-16.4a6 6 0 0 0 -12 0v16.4a6 6 0 0 0 6 6z">
                                                </path>
                                                <path
                                                    d="m186.875 490.443h200a26.029 26.029 0 0 0 26-26v-265.6a6 6 0 0 0 -6-6h-21.9c1.689-2.1 3.647-4.5 6-7.34a25.9 25.9 0 0 0 -4.862-37.835 6.255 6.255 0 0 0 -.634-.393l-.12-.063a26.353 26.353 0 0 0 -20.115-4.131 27.269 27.269 0 0 0 -17.888 12.223c-1.926 3.1-3.582 5.756-5.039 8.091-7.863 12.611-9.993 16.028-17.253 29.448h-20.788l14.544-51.7c.033-.117.061-.234.087-.351a25.9 25.9 0 0 0 -22.143-31.062 5.968 5.968 0 0 0 -.744-.046h-.137a26.362 26.362 0 0 0 -19.683 5.852 27.269 27.269 0 0 0 -10 19.211l-3.813 58.1h-23.156v-73.261a26 26 0 0 0 -52 0v73.258h-20.356a6 6 0 0 0 -6 6v64.8h-16.2a73.8 73.8 0 0 0 0 147.6h16.2v53.2a26.029 26.029 0 0 0 26 25.999zm165.62-320.7c1.459-2.34 3.119-5 5-8.029a15.327 15.327 0 0 1 10.032-6.854 14.47 14.47 0 0 1 11.222 2.372 6.081 6.081 0 0 0 .634.393l.071.038a13.9 13.9 0 0 1 2.33 20.119c-5.742 6.927-9.225 11.351-12.057 15.06h-31c4.745-8.625 7.181-12.533 13.773-23.097zm-74.328-34.13a15.324 15.324 0 0 1 5.609-10.776 14.451 14.451 0 0 1 11.013-3.2 6.179 6.179 0 0 0 .744.046h.08a13.906 13.906 0 0 1 11.6 16.4l-15.4 54.764h-17.4zm-64.936-30.029a14.015 14.015 0 0 1 14 14v14h-28v-14a14.015 14.015 0 0 1 14-13.998zm-14 40h28v47.258h-28zm-26.356 59.258h228v259.6a14.016 14.016 0 0 1 -14 14h-200a14.015 14.015 0 0 1 -14-14zm-28.2 194.4a61.8 61.8 0 0 1 0-123.6h16.2v123.6z">
                                                </path>
                                                <path
                                                    d="m266.141 55.185a70.449 70.449 0 0 0 -4.294 7.943c-4.148 9.253-3.387 19.9 1.988 27.79 7.937 11.649 22.547 13.806 32.268 13.806 1.107 0 2.152-.028 3.116-.074a34.047 34.047 0 0 0 27.781-16.217c6.363-10.3 7.013-23.016 1.786-34.914-4.416-10.887-12.525-19.269-24.1-24.914a73.8 73.8 0 0 0 -26.232-6.89c-9.258-.671-11.852.644-13.4 3.3a6.162 6.162 0 0 0 .2 6.441 16.4 16.4 0 0 0 1.5 1.827c1.764 1.969 5.047 5.633 4.8 9.547-.235 3.661-2.867 8.08-5.413 12.355zm6.695 12.76a61.63 61.63 0 0 1 3.614-6.62c3.124-5.243 6.665-11.187 7.075-17.744a20.083 20.083 0 0 0 -1.753-9.4c11.373 1.667 29.216 7.283 35.922 23.912.024.06.05.121.076.18 3.646 8.25 3.289 16.942-.978 23.846a22.208 22.208 0 0 1 -18.135 10.54c-11.95.558-20.788-2.46-24.9-8.5-3.049-4.467-3.416-10.645-.921-16.214z">
                                                </path>
                                                <path
                                                    d="m440.868 113.229c1.244-11.683-1.949-22.9-9.492-33.341a73.749 73.749 0 0 0 -19.876-18.455c-7.847-4.959-10.752-5.025-13.372-3.414a6.163 6.163 0 0 0 -2.866 5.771 16.318 16.318 0 0 0 .458 2.32c.626 2.568 1.791 7.347-.273 10.683-1.928 3.117-6.334 5.77-10.6 8.336a70.638 70.638 0 0 0 -7.536 4.977c-8.024 6.2-12.379 15.949-11.363 25.44 1.67 15.614 16.2 24.75 24.713 28.806a34.986 34.986 0 0 0 15.054 3.46 33.922 33.922 0 0 0 17.089-4.648c10.479-6.071 17.055-16.979 18.064-29.935zm-24.075 19.557a22.2 22.2 0 0 1 -20.962.733c-10.793-5.143-17.166-11.979-17.944-19.249-.575-5.377 2.018-11 6.847-14.729a61.37 61.37 0 0 1 6.311-4.132c5.228-3.148 11.154-6.717 14.609-12.3a20.092 20.092 0 0 0 2.89-9.111c9.239 6.838 22.32 20.21 20.383 38.035-.007.066-.013.131-.018.2-.68 8.987-5.096 16.481-12.116 20.553z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="campus-widget-item__content">
                                        <h3 class="campus-widget-item__title"><a href="#">Arts & Clubs</a></h3>
                                        <p>This is a valuable period where you learn and grow. School life can be tiring but
                                            it sets the foundation for your whole life.</p>
                                    </div>
                                </div>
                                <!-- Campus Widget Item End -->

                                <!-- Campus Widget Item Start -->
                                <div class="campus-widget-item" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="campus-widget-item__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512"
                                            height="512">
                                            <title>basket ball</title>
                                            <g fill="#000000">
                                                <path
                                                    d="M320.867,34.986A236.882,236.882,0,0,0,28.11,198.451,237.7,237.7,0,0,0,256.343,501.739,237.362,237.362,0,0,0,483.89,329.085a237.985,237.985,0,0,0-163.023-294.1ZM440.185,137.551C426.666,151.584,375.1,201.785,279.229,258c-1.06-1.795-2.107-3.6-3.119-5.427A224.328,224.328,0,0,1,273.2,40.509a224.434,224.434,0,0,1,43.821,7.938A221.334,221.334,0,0,1,440.185,137.551ZM147.692,68.08A221.133,221.133,0,0,1,255.678,39.8c.73,0,1.46.012,2.19.019a238.391,238.391,0,0,0,5.994,219.535c1.053,1.9,2.144,3.779,3.246,5.649-2.768,1.576-5.559,3.154-8.4,4.737-18.126,10.11-35.5,19.117-51.89,27.116-.309-.558-.62-1.108-.93-1.669-61.739-111.521-81.512-190.8-85.539-209.157A226.041,226.041,0,0,1,147.692,68.08ZM108.263,95.991c2.437,10.077,6.874,26.506,14.345,48.462,11.771,34.585,33.65,89.987,71.035,157.518.177.321.355.636.533.957-14.4,6.8-27.938,12.781-40.388,18l-.053-.1c-28.716-51.87-68.229-94.294-111.7-120.081A222.379,222.379,0,0,1,108.263,95.991ZM38.384,214.9C78,239.386,114.06,278.57,140.741,326.292c-12.588,5.063-23.841,9.272-33.514,12.706-26.6,9.443-45.7,14.649-54.486,16.863A222.659,222.659,0,0,1,38.384,214.9Zm22.7,157.613c-.7-1.271-1.383-2.55-2.059-3.83,14.387-3.775,45.765-12.86,88.331-30.016,22.983,45.138,35.244,92.829,35.038,136.408A221.562,221.562,0,0,1,61.079,372.516ZM196.323,479.455c1.055-46.629-11.59-97.836-35.989-146.128,12.759-5.359,26.378-11.395,40.727-18.175,51.865,90.754,99.435,144.082,118.113,163.386A220.654,220.654,0,0,1,196.323,479.455Zm167.986-20a225.586,225.586,0,0,1-30.354,14.1c-12.787-12.748-64.352-66.971-120.241-164.485,16.479-8.056,33.809-17.054,51.817-27.1,3.065-1.71,6.075-3.414,9.059-5.115A236.419,236.419,0,0,0,446.44,380.426,222.112,222.112,0,0,1,364.309,459.455Zm106.116-134.2a226.528,226.528,0,0,1-16.5,41.779,222.4,222.4,0,0,1-167.2-97.2c56.191-33,96.789-63.626,121.853-84.43,19.359-16.068,32.272-28.512,39.312-35.674q1.544,2.622,3.028,5.293A223.167,223.167,0,0,1,470.425,325.254Z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="campus-widget-item__content">
                                        <h3 class="campus-widget-item__title"><a href="#">Sports and Fitness</a></h3>
                                        <p>This is a valuable period where you learn and grow. School life can be tiring but
                                            it sets the foundation for your whole life.</p>
                                    </div>
                                </div>
                                <!-- Campus Widget Item End -->

                            </div>
                            <!-- Campus Widget End -->

                        </div>

                    </div>
                </div>

                <div class="campus-wrapper__shape-01" data-depth="-0.5"></div>
                <div class="campus-wrapper__shape-02" data-depth="0.5"></div>
            </div>

        </div>
    </div>
    <!-- Campus Life End -->
    <!-- additonal section end -->




    <!-- Blog Start -->
    <div class="blog-section section-padding-01">
        <div class="container ">

            <div class="row">
                <div class="col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-03"><span class="orange">Our Latest</span> Blogs</h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-lg-6">
                    <div class="courses-tab-menu aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <ul class="nav justify-content-lg-end">
                            <a class="active" href="{{route('blogs')}}">All Blogs</a>
                        </ul>
                    </div>
                </div>
            </div>

            @php use Illuminate\Support\Str; @endphp

            <div class="row gy-6 grid">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6 grid-item">
                        <div class="blog-item-02" data-aos="fade-up" data-aos-duration="1000">
                            <div class="blog-item-02__image">
                                <a href="#"><img src="{{ asset($blog->blog_image) }}" alt="Blog" width="370" height="201"></a>
                            </div>
                            <div class="blog-item-02__content">
                                <div class="blog-item-02__meta">
                                    <span class="meta-action"><i class="fas fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                                    </span>
                                </div>
                                <h3 class="blog-item-02__title"><a href="#">{{ $blog->title }}</a></h3>
                                <p>{{ Str::words(strip_tags($blog->description), 20, '...') }}</p>
                                <a class="blog-item-02__more btn btn-light btn-hover-white" href="blogDetails/{{ $blog->id }}">
                                    Read More <i class="fas fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>




        </div>
    </div>




    <!-- Blog End -->
    <!-- Partners Start -->
    <div class="partners-seaction section-padding-02">
        <div class="container">
            <div class="row gy-8 align-items-center">
                <div class="col-lg-4 col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title pe-xxl-2" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-02">We Collaborate With <span>190+</span> Leading Universities And
                            Companies</h2>
                    </div>
                    <!-- Section Title End -->

                    <div class="section-btn" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#" class="btn btn-light btn-hover-primary">View all Partners</a>
                    </div>
                </div>

                <div class="col-lg-8">



                    <div class="logo-carousel">
                        <div class="carousel-wrapper">
                            <button class="carousel-arrow left" onclick="slideLeft()">
                                <i class="fas fa-angle-left"></i>
                            </button>
                            <div class="carousel-view" id="carouselView">
                                <div class="carousel-track" id="carouselTrack">
                                    <div class="carousel-item-custom"><img
                                            src="{{ asset("front/assets/images/partners-logo/client-logo-01.jpg")}}"
                                            alt="Logo 1" />
                                    </div>
                                    <div class="carousel-item-custom"><img
                                            src="{{ asset("front/assets/images/partners-logo/client-logo-04.jpg")}}"
                                            alt="Logo 2" />
                                    </div>
                                    <div class="carousel-item-custom"><img
                                            src="{{ asset("front/assets/images/partners-logo/client-logo-05.jpg")}}"
                                            alt="Logo 3" />
                                    </div>
                                    <div class="carousel-item-custom"><img
                                            src="{{ asset("front/assets/images/partners-logo/client-logo-06.jpg")}}"
                                            alt="Logo 4" />
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-arrow right" onclick="slideRight()">
                                <i class="fas fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Partners End -->


    <!-- slider  -->



@endsection