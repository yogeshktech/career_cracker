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
                        <h2 class="slider-caption-04__main-title">Unlock Your Dream IT Job</h2>

                        <h4 class="slider-caption-04__sub-title">
                            Launch your IT career with CareerCracker - no fees until you're hired! Upskill in 45 days. Get placed. Then pay. It’s not a course, It’s your career launchpad.
                        </h4>
                        <h4 class="slider-caption-04__sub-title"></h4>

                        <div class="d-flex gap-3 mt-3">
                            <a href="{{route('all_course')}}" class="slider-caption-04__btn btn btn-orange rounded-button">View All
                                Courses</a>

                            @guest
                            <button class="slider-caption-04__btn btn btn-orange rounded-button" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register Now
                            </button>
                            @endguest

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

                        </h4>
                        {{-- <button data-bs-toggle="modal" data-bs-target="#registerModal" class="btn btn-link">
                                    Register Now</button> --}}



                        <form action="{{ route('enquiry_send') }}" method="POST">
                            @csrf
                            <div class="slider-register__form">
                                <div class="slider-register__input">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="slider-register__input">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="slider-register__input">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact No" value="{{ old('phone') }}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="slider-register__input">
                                    <i class="fas fa-comment"></i>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Enter Your Message" required>{{ old('message') }}</textarea>
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
                        <h1 class="section-title__title-03">Our Philosophy</h1>
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
                {{-- <div class="about-image scene">
                        <div class="about-image__image" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('front/assets/images/about-us-02-introduce-image.png') }}" alt="About"
                width="1171" height="619">
            </div>



            <img class="about-image__shape-01" data-depth="-0.5" src="{{ asset('front/assets/images/shape/edumall-shape-01.png') }}" alt="Shape" width="179" height="178">
            <img class="about-image__shape-02" data-depth="-0.5" src="{{ asset('front/assets/images/shape/edumall-shape-grid-dots.png') }}" alt="Shape" width="417" height="371">

        </div> --}}
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
                            <div class="counter" data-target="100" data-label="₹19 LPA Avg">0</div>
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
{{-- <div class="categories-section bg-color-03 section-padding-01">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03"><span class="orange">Upcoming</span> Batches </h2>
            </div>
            <div class="row g-6">
                @foreach ($course_sale_no as $course)
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
</div> --}}
<!-- Categories Section End -->

<div class="container">
    <div class="row">
        <div class="">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03"><span class="orange">Upcoming</span> Batches </h2>
            </div>
        </div>
        @foreach ($course_sale_no as $course)
        <div class="col-md-4 col-lg-2 mb-4">
            <!-- Course Start -->
            <div class="course-item">
                <div class="course-header">
                    <div class="course-header__thumbnail">
                        <a href="{{ route('courses.show', $course->id) }}">
                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" width="258" height="173">
                        </a>
                    </div>
                </div>
                <div class="course-info">
                    <h3 class="course-info__title">
                        <a href="{{ route('courses.show', $course->id) }}"><b>{{ $course->title }}</b></a>
                    </h3>
                    <div class="course-info__price">
                        <span class="sale-price">₹{{ number_format($course->sale_price, 2) }}</span>
                    </div>
                    <div class="course-info__rating">
                        <div class="rating-star">
                            <div class="rating-label" style="width: {{ $course->rating ?? 80 }}%;"></div>
                        </div>
                        <span>({{ $course->reviews_count ?? 2 }})</span>
                    </div>
                </div>
            </div>
            <!-- Course End -->
        </div>
        @endforeach
    </div>
</div>
























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
                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" width="258" height="173">
                                        </a>
                                    </div>
                                </div>
                                <div class="course-info">
                                    {{-- <span class="course-info__badge-text badge-all">{{ $course->level }}</span>
                                    --}}
                                    <h3 class="course-info__title">
                                        <a href="{{ route('courses.show', $course->id) }}"><b>{{ $course->title }}</b></a>
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
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px" viewBox="0 0 50 40">
                                    <path d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                                    </path>
                                    <path d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016  ((*50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
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
                document.addEventListener('DOMContentLoaded', function() {
                    const swiper = new Swiper('.testimonial-slider', {
                        slidesPerView: 1
                        , spaceBetween: 30
                        , loop: true
                        , pagination: {
                            el: '.swiper-pagination'
                            , clickable: true
                        , }
                        , navigation: {
                            nextEl: '.swiper-button-next'
                            , prevEl: '.swiper-button-prev'
                        , }
                        , autoplay: {
                            delay: 5000
                            , disableOnInteraction: false
                        , }
                        , breakpoints: {
                            768: {
                                slidesPerView: 2
                            , }
                            , 992: {
                                slidesPerView: 3
                            , }
                        , }
                    , });
                });

            </script>
        </div>
        <!-- Testimonial End -->
    </div>
    <div class="testimonial-section__shape-01" data-depth="-0.5"></div>
    <div class="testimonial-section__shape-02" data-depth="0.7"></div>
    <div class="testimonial-section__shape-03" data-depth="-0.5"></div>
    <img class="testimonial-section__shape-04" data-depth="0.7" src="{{ asset("front/assets/images/shape/edumall-shape-01.png") }}" alt="Shape" width="179" height="178">
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
                        <p>{!! Str::words(strip_tags($blog->description), 20, '...') !!}</p>
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
                                    <div class="carousel-item-custom"><img src="{{ asset("
                                            front/assets/images/partners-logo/client-logo-01.jpg")}}" alt="Logo 1" />
</div>
<div class="carousel-item-custom"><img src="{{ asset("
                                            front/assets/images/partners-logo/client-logo-04.jpg")}}" alt="Logo 2" />
</div>
<div class="carousel-item-custom"><img src="{{ asset("
                                            front/assets/images/partners-logo/client-logo-05.jpg")}}" alt="Logo 3" />
</div>
<div class="carousel-item-custom"><img src="{{ asset("
                                            front/assets/images/partners-logo/client-logo-06.jpg")}}" alt="Logo 4" />
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
