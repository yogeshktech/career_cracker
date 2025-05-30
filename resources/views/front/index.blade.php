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
                            <h4 class="slider-register__title">Kickstart your career with 100% <br> placement and high CTC
                                in just 45 days
                                <button data-bs-toggle="modal" data-bs-target="#registerModal"
                                        class="btn btn-link"> — Register Now</button>
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
                        <p class="lead">Your success is our scorecard — transforming careers through
                            industry-ready training and unmatched placement support.
                        </p>
                    </div>
                    <!-- Right side: 2x2 Counter Grid -->
                    <div class="col-md-6">
                        <div class="row text-center g-4">
                            <!-- Top Row -->
                            <div class="col-6">
                                <div class="counter" data-target="20" data-label="1900+">0</div>
                                <div class="counter-label">Students Successfully Placed</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="89" data-label="439+">0</div>
                                <div class="counter-label">Trusted Hiring Partners</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="208" data-label="6000+">0</div>
                                <div class="counter-label">IT Professionals Trained</div>
                            </div>
                            <div class="col-6">
                                <div class="counter" data-target="100" data-label="₹19 LPA Avg | ₹45 LPA">0</div>
                                <div class="counter-label">Highest CTC Packages Offered</div>
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
                                            {{-- <a href="#" class="course-info__instructor">{{ $course->instructor ?? '' }}</a>
                                            --}}
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
                <h2 class="section-title__title-03"><span class="orange">Student Testimonials:
                    </span>The Career Cracker Experience</h2>
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
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
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
    <!-- Blog Start -->
    <div class="blog-section section-padding-01">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-03"><span class="orange">Our Latest</span> Blogs</h2>
                    </div>
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
                                <a href="blog/{{ $blog->id }}"><img src="{{ asset($blog->blog_image) }}" alt="Blog" width="370" height="201"></a>
                            </div>
                            <div class="blog-item-02__content">
                                <div class="blog-item-02__meta">
                                    <span class="meta-action"><i class="fas fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                                    </span>
                                </div>
                                <h3 class="blog-item-02__title"><a href="#">{{ $blog->title }}</a></h3>
                                <p>{{ Str::words(strip_tags($blog->description), 20, '...') }}</p>
                                <a class="blog-item-02__more btn btn-light btn-hover-white" href="blog/{{ $blog->id }}">
                                    Read More <i class="fas fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="partners-seaction section-padding-02">
        <div class="container">
            <div class="row gy-8 align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="section-title pe-xxl-2" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-02">We Collaborate With <span>190+</span> Leading Universities And
                            Companies</h2>
                    </div>
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
    </div> --}}
@endsection