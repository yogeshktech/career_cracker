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
                                <a href="{{route('all_course')}}" class="slider-caption-04__btn btn btn-orange rounded-button">View All
                                    Courses</a>
                                {{-- <a href="" class="slider-caption-04__btn btn btn-orangee rounded-button">Enroll Now</a> --}}
                            </div>
                        </div>


                        <!-- Slider Caption End -->
                    </div>
                    <div class="col-lg-6  ">

                        <!-- Slider Register Form Start -->
                        <div class="slider-register__box text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h4 class="slider-register__title">Register for A Free Account <br> To Access To
                                <span>1200+</span> Online Courses</h4>

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
                                        <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Submit Now</button>
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

                            <a href="{{route('about')}}"><button class="btn btn-orange rounded-button mt-3">Read More</button>
                        </div></a>
                        <!-- Section Title End -->
                    </div>

                    <!-- About Image Start -->
                    <div class="about-image scene">
                        <div class="about-image__image" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('front/assets/images/about-us-02-introduce-image.png') }}" alt="About" width="1171" height="619">
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

                        <img class="about-image__shape-01" data-depth="-0.5" src="{{ asset('front/assets/images/shape/edumall-shape-01.png') }}"
                            alt="Shape" width="179" height="178">
                        <img class="about-image__shape-02" data-depth="-0.5"
                            src="{{ asset('front/assets/images/shape/edumall-shape-grid-dots.png') }}" alt="Shape" width="417" height="371">

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
        <h2>Heading text</h2>
        <p class="text-muted mt-3">Reference site about Lorem Ipsum, giving information on its origins, as well as a random
            Lipsum generator.</p>

        <div class="row mt-5 mb-6 g-4">
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5 class="fs-3">Our Value</h3>
                    <p>At CareerCracker, we value integrity, excellence, and a commitment to lifelong learning. We believe
                        that education should be accessible to all and strive to create an inclusive and welcoming
                        environment for our students.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5  class="fs-3">Our services</h5>
                    <p>We offer a wide range of services to support students at all levels, including academic tutoring,
                        interview preparation, placement help and more. Our services are tailored to the unique needs of
                        each student to ensure the best possible outcomes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box h-100 text-start">
                    <h5  class="fs-3">Our Approach</h5>
                    <p>We take a holistic approach to education, recognizing that academic success is just one aspect of a
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

            <!-- Section Title Start -->
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03"><span class="orange">Subject</span> Areas </h2>
            </div>
            <!-- Section Title End -->

            <div class="row g-6">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <path
                                        d="m490.848 162.982c-11.265-18.223-33.212-52.734-71.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338s-10.62 2.446-13.228 7.339c-38.965 72.979-59.854 107.314-71.074 125.435-8.626 13.923-20.698 31.618-20.698 62.226 0 57.891 47.109 105 105 105s106-47.109 106-105c0-30.802-11.84-47.93-21.152-63.018z"
                                        fill="#ff7b4a"></path>
                                    <path
                                        d="m512 226c0-30.802-11.84-47.93-21.152-63.018-11.265-18.223-33.212-52.734-71.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338v300c57.891 0 106-47.109 106-105z"
                                        fill="#e63950"></path>
                                    <path
                                        d="m339.848 162.982c-11.265-18.223-32.212-52.734-70.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338s-10.62 2.446-13.228 7.339c-38.965 72.979-59.854 107.314-71.074 125.435-8.626 13.923-20.698 31.618-20.698 62.226 0 57.891 47.109 105 105 105s105-47.109 105-105c0-30.802-11.84-47.93-21.152-63.018z"
                                        fill="#7ed8f6"></path>
                                    <path
                                        d="m361 226c0-30.802-11.84-47.93-21.152-63.018-11.265-18.223-32.212-52.734-70.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338v300c57.891 0 105-47.109 105-105z"
                                        fill="#6aa9ff"></path>
                                    <path
                                        d="m189.848 162.982c-11.265-18.223-32.212-52.734-70.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338s-10.62 2.446-13.228 7.339c-38.965 72.979-60.854 107.314-72.074 125.435-8.626 13.923-20.698 31.618-20.698 62.226 0 57.891 48.109 105 106 105s105-47.109 105-105c0-30.802-11.84-47.93-21.152-63.018z"
                                        fill="#fed843"></path>
                                    <path
                                        d="m211 226c0-30.802-11.84-47.93-21.152-63.018-11.265-18.223-32.212-52.734-70.62-124.644-2.608-4.892-7.918-7.338-13.228-7.338v300c57.891 0 105-47.109 105-105z"
                                        fill="#ff9f00"></path>
                                    <path
                                        d="m497 421h-241-241c-8.284 0-15 6.716-15 15s6.716 15 15 15h241 241c8.284 0 15-6.716 15-15s-6.716-15-15-15z"
                                        fill="#5f55af"></path>
                                    <path d="m512 436c0-8.284-6.716-15-15-15h-241v30h241c8.284 0 15-6.716 15-15z"
                                        fill="#453d83"></path>
                                    <path
                                        d="m296.605 395.395-30-30c-2.93-2.93-6.768-4.395-10.605-4.395s-7.676 1.465-10.605 4.395l-30 30c-2.813 2.812-4.395 6.621-4.395 10.605v60c0 8.291 6.709 15 15 15h30 30c8.291 0 15-6.709 15-15v-60c0-3.984-1.582-7.793-4.395-10.605z"
                                        fill="#d5e8fe"></path>
                                    <path
                                        d="m301 466v-60c0-3.984-1.582-7.793-4.395-10.605l-30-30c-2.93-2.93-6.768-4.395-10.605-4.395v120h30c8.291 0 15-6.709 15-15z"
                                        fill="#a8d3d8"></path>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Art & Design</h4>
                                <p class="categories-item-02__description">Fun & Challenging</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <path
                                            d="m497 31h-482c-8.401 0-15 6.599-15 15v420c0 8.401 6.599 15 15 15h482c8.401 0 15-6.599 15-15v-420c0-8.401-6.599-15-15-15z"
                                            fill="#edf5ff"></path>
                                        <path d="m512 46v420c0 8.401-6.599 15-15 15h-241v-450h241c8.401 0 15 6.599 15 15z"
                                            fill="#d5e8fe"></path>
                                        <path
                                            d="m436 151h-180-180c-8.401 0-15 6.599-15 15v240c0 8.401 6.599 15 15 15h180 180c8.401 0 15-6.599 15-15v-240c0-8.401-6.599-15-15-15z"
                                            fill="#6aa9ff"></path>
                                        <path d="m451 166v240c0 8.401-6.599 15-15 15h-180v-270h180c8.401 0 15 6.599 15 15z"
                                            fill="#4895ff"></path>
                                        <circle cx="436" cy="106" fill="#e63950" r="15"></circle>
                                        <circle cx="376" cy="106" fill="#4895ff" r="15"></circle>
                                        <circle cx="316" cy="106" fill="#4895ff" r="15"></circle>
                                        <path
                                            d="m318.52 324.32c-4.6-6.899-2.739-16.201 4.16-20.801l26.279-17.519-26.279-17.52c-6.899-4.6-8.76-13.901-4.16-20.801 4.585-6.899 13.843-8.76 20.801-4.16l45 30c4.175 2.783 6.68 7.471 6.68 12.48s-2.505 9.697-6.68 12.48l-45 30c-7.02 4.654-16.281 2.633-20.801-4.159z"
                                            fill="#d5e8fe"></path>
                                        <path
                                            d="m172.68 328.48-45-30c-4.175-2.783-6.68-7.471-6.68-12.48s2.505-9.697 6.68-12.48l45-30c6.899-4.6 16.201-2.739 20.801 4.16s2.739 16.201-4.16 20.801l-26.28 17.519 26.279 17.52c6.899 4.6 8.76 13.901 4.16 20.801-4.521 6.793-13.785 8.81-20.8 4.159z"
                                            fill="#edf5ff"></path>
                                        <path
                                            d="m256 91h-180c-8.291 0-15 6.709-15 15s6.709 15 15 15h180c8.291 0 15-6.709 15-15s-6.709-15-15-15z"
                                            fill="#5f55af"></path>
                                        <path d="m271 106c0-8.291-6.709-15-15-15v30c8.291 0 15-6.709 15-15z" fill="#453d83">
                                        </path>
                                        <path
                                            d="m292.709 212.582c-7.412-3.706-16.392-.688-20.127 6.709l-16.582 33.164-43.418 86.836c-3.706 7.412-.703 16.421 6.709 20.127 7.48 3.715 16.436.652 20.127-6.709l16.582-33.164 43.418-86.836c3.706-7.412.703-16.421-6.709-20.127z"
                                            fill="#edf5ff"></path>
                                        <path
                                            d="m292.709 212.582c-7.412-3.706-16.392-.688-20.127 6.709l-16.582 33.164v67.09l43.418-86.836c3.706-7.412.703-16.421-6.709-20.127z"
                                            fill="#d5e8fe"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Development</h4>
                                <p class="categories-item-02__description">Code with Confident</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve">
                                    <path style="fill:#E8A137;"
                                        d="M437.881,279.46l-50.28-156.2c-0.756-2.35-2.081-4.477-3.856-6.191L267.298,4.566  C264.266,1.637,260.216,0,256,0l0,0c-4.216,0-8.267,1.637-11.298,4.566L128.255,117.069c-1.775,1.715-3.1,3.842-3.856,6.191  l-50.28,156.2c-1.141,3.543-0.923,7.384,0.61,10.776l55.161,122c1.539,3.402,4.291,6.108,7.718,7.59l112.442,48.588  c1.899,0.82,3.924,1.23,5.95,1.23c2.025,0,4.052-0.41,5.95-1.23l112.442-48.588c3.427-1.481,6.179-4.188,7.718-7.59l55.161-122  C438.804,286.845,439.022,283.004,437.881,279.46z">
                                    </path>
                                    <path style="fill:#FFCC30;"
                                        d="M256,0L256,0c-4.216,0-8.267,1.637-11.298,4.566L128.255,117.069c-1.775,1.715-3.1,3.842-3.856,6.191  l-50.28,156.2c-1.141,3.543-0.923,7.384,0.61,10.776l55.161,122c1.539,3.402,4.291,6.108,7.718,7.59l112.442,48.588  c1.899,0.82,3.924,1.23,5.95,1.23V0z">
                                    </path>
                                    <path style="fill:#99522E;"
                                        d="M362.345,295.467c-5.068-6.553-14.489-7.758-21.042-2.688L271,347.151v-48.173  c0.397-0.252,0.789-0.519,1.168-0.813l77.574-59.997c6.553-5.068,7.757-14.489,2.688-21.042s-14.49-7.758-21.042-2.688L271,261.144  v-52.471l48.4-37.433c6.553-5.068,7.757-14.489,2.688-21.042s-14.49-7.758-21.042-2.688L271,170.748V92.65c0-8.284-6.716-15-15-15  s-15,6.716-15,15v78.097l-30.047-23.238c-6.553-5.068-15.974-3.865-21.042,2.688c-5.068,6.553-3.865,15.974,2.688,21.042  l48.4,37.433v52.471l-60.389-46.705c-6.554-5.067-15.975-3.865-21.042,2.688c-5.068,6.553-3.865,15.974,2.688,21.042l77.574,59.997  c0.38,0.294,0.771,0.561,1.168,0.813v48.173l-70.304-54.373c-6.553-5.068-15.974-3.864-21.042,2.688  c-5.068,6.553-3.865,15.974,2.688,21.042L241,385.077V497c0,8.284,6.716,15,15,15s15-6.716,15-15V385.077l88.657-68.568  C366.21,311.441,367.414,302.02,362.345,295.467z">
                                    </path>
                                    <path style="fill:#802812;"
                                        d="M362.345,295.467c-5.068-6.553-14.489-7.758-21.042-2.688L271,347.151v-48.173  c0.397-0.252,0.789-0.519,1.168-0.813l77.574-59.997c6.553-5.068,7.757-14.489,2.688-21.042s-14.49-7.758-21.042-2.688L271,261.144  v-52.471l48.4-37.433c6.553-5.068,7.757-14.489,2.688-21.042s-14.49-7.758-21.042-2.688L271,170.748V92.65c0-8.284-6.716-15-15-15  c0,0-0.229,434.35,0,434.35c8.284,0,15-6.716,15-15V385.077l88.657-68.568C366.21,311.441,367.414,302.02,362.345,295.467z">
                                    </path>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Lifestyle</h4>
                                <p class="categories-item-02__description">New Skills, New You</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <g>
                                            <path
                                                d="m386.057 143.491-119.08-138.065c-2.849-3.304-6.995-5.203-11.358-5.203s-8.51 1.899-11.358 5.203l-119.081 138.065c-3.832 4.442-4.722 10.71-2.279 16.044 2.443 5.333 7.771 8.753 13.638 8.753h29.895v328.372c0 5.75 3.238 10.737 7.987 13.255h158.472c4.627-2.554 7.765-7.478 7.765-13.138v-328.49h34.042c5.866 0 11.194-3.42 13.638-8.753 2.44-5.332 1.551-11.601-2.281-16.043z"
                                                fill="#c4e83a"></path>
                                            <g
                                                style="fill:none;stroke:#000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10">
                                                <path d="m134.552 496.66v-87.153"></path>
                                                <path d="m376.5 496.66v-87.153"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <path
                                                d="m386.057 143.491-119.08-138.065c-2.849-3.304-6.995-5.203-11.358-5.203v509.693h77.273c4.627-2.554 7.765-7.478 7.765-13.138v-328.49h34.042c5.866 0 11.194-3.42 13.638-8.753 2.441-5.333 1.552-11.602-2.28-16.044z"
                                                fill="#90d960"></path>
                                        </g>
                                        <g
                                            style="fill:none;stroke:#000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10">
                                            <path d="m134.552 496.66v-87.153"></path>
                                            <path d="m376.5 496.66v-87.153"></path>
                                        </g>
                                        <g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="m148.75 404.368h-41.5c-59.19 0-107.33 48.2-107.25 107.41h256v-.15c0-59.14-48.11-107.26-107.25-107.26z"
                                                                fill="#5ecbf1"></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m256 511.628v.15h-128v-107.41h20.75c59.14 0 107.25 48.12 107.25 107.26z"
                                                                fill="#4793ff"></path>
                                                        </g>
                                                        <g>
                                                            <ellipse cx="128" cy="360.034" fill="#e5ae8c" rx="76.814"
                                                                ry="76.814"
                                                                transform="matrix(.383 -.924 .924 .383 -253.612 340.512)">
                                                            </ellipse>
                                                            <g>
                                                                <path
                                                                    d="m128 283.22v153.627c42.355 0 76.813-34.458 76.813-76.814.001-42.354-34.458-76.813-76.813-76.813z"
                                                                    fill="#ffddce"></path>
                                                                <path
                                                                    d="m51.187 360.034c0 42.355 34.458 76.814 76.814 76.814v-153.628c-42.356 0-76.814 34.459-76.814 76.814z"
                                                                    fill="#ffece2"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="m404.75 404.368h-41.5c-59.14 0-107.25 48.12-107.25 107.26v.15h256c.08-59.21-48.06-107.41-107.25-107.41z"
                                                                fill="#ff0059"></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m512 511.778h-128v-107.41h20.75c59.19 0 107.33 48.2 107.25 107.41z"
                                                                fill="#d20041"></path>
                                                        </g>
                                                        <g>
                                                            <ellipse cx="384" cy="360.034" fill="#e5ae8c" rx="76.814"
                                                                ry="76.814"
                                                                transform="matrix(.383 -.924 .924 .383 -95.578 577.025)">
                                                            </ellipse>
                                                            <g>
                                                                <path
                                                                    d="m384 283.22v153.627c42.355 0 76.813-34.458 76.813-76.814.001-42.354-34.458-76.813-76.813-76.813z"
                                                                    fill="#dd9366"></path>
                                                                <path
                                                                    d="m307.187 360.034c0 42.355 34.458 76.814 76.814 76.814v-153.628c-42.356 0-76.814 34.459-76.814 76.814z"
                                                                    fill="#e5ae8c"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Personal Development</h4>
                                <p class="categories-item-02__description">Develop Yourself</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <path
                                            d="m346 15v467h-135l-30 30h-150c-8.401 0-15-6.599-15-15v-482c0-8.401 6.599-15 15-15h300c8.401 0 15 6.599 15 15z"
                                            fill="#edf5ff"></path>
                                        <g fill="#d5e8fe">
                                            <path d="m346 15v467h-135l-30 30v-512h150c8.401 0 15 6.599 15 15z"></path>
                                            <path
                                                d="m286 106c0 8.401-6.599 15-15 15h-180c-8.401 0-15-6.599-15-15s6.599-15 15-15h180c8.401 0 15 6.599 15 15z">
                                            </path>
                                            <path
                                                d="m226 166c0 8.401-6.599 15-15 15h-120c-8.401 0-15-6.599-15-15s6.599-15 15-15h120c8.401 0 15 6.599 15 15z">
                                            </path>
                                            <path
                                                d="m196 226c0 8.401-6.599 15-15 15h-90c-8.401 0-15-6.599-15-15s6.599-15 15-15h90c8.401 0 15 6.599 15 15z">
                                            </path>
                                        </g>
                                        <g>
                                            <path
                                                d="m331 211c-41.353 0-75 33.647-75 75 0 8.291 6.709 15 15 15s15-6.709 15-15c0-24.814 20.186-45 45-45s45 20.186 45 45c0 8.291 6.709 15 15 15s15-6.709 15-15c0-41.353-33.647-75-75-75z"
                                                fill="#47568c"></path>
                                            <path
                                                d="m376 286c0 8.291 6.709 15 15 15s15-6.709 15-15c0-41.353-33.647-75-75-75v30c24.814 0 45 20.186 45 45z"
                                                fill="#29376d"></path>
                                            <path
                                                d="m467.251 376h-136.251-135l-30 30v91c0 8.291 6.709 15 15 15h150 150c8.291 0 15-6.709 15-15v-91z"
                                                fill="#61729b"></path>
                                            <path d="m496 497v-91l-28.749-30h-136.251v136h150c8.291 0 15-6.709 15-15z"
                                                fill="#47568c"></path>
                                            <path
                                                d="m481 271h-150-150c-8.291 0-15 6.709-15 15v120h165 165v-120c0-8.291-6.709-15-15-15z"
                                                fill="#6aa9ff"></path>
                                            <path d="m496 286c0-8.291-6.709-15-15-15h-150v135h165z" fill="#4895ff"></path>
                                            <path
                                                d="m361 361h-30-30c-8.291 0-15 6.709-15 15v30c0 24.814 20.186 45 45 45s45-20.186 45-45v-30c0-8.291-6.709-15-15-15z"
                                                fill="#edf5ff"></path>
                                            <path d="m376 406v-30c0-8.291-6.709-15-15-15h-30v90c24.814 0 45-20.186 45-45z"
                                                fill="#d5e8fe"></path>
                                        </g>
                                        <path d="m196 226c0 8.401-6.599 15-15 15v-30c8.401 0 15 6.599 15 15z"
                                            fill="#b5dbff"></path>
                                        <path d="m226 166c0 8.401-6.599 15-15 15h-30v-30h30c8.401 0 15 6.599 15 15z"
                                            fill="#b5dbff"></path>
                                        <path d="m286 106c0 8.401-6.599 15-15 15h-90v-30h90c8.401 0 15 6.599 15 15z"
                                            fill="#b5dbff"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Business</h4>
                                <p class="categories-item-02__description">Improve your business</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <g>
                                            <path
                                                d="m360 136v60c0 8.28-6.72 15-15 15s-15-6.72-15-15v-60c0-8.28 6.72-15 15-15s15 6.72 15 15z"
                                                fill="#fabe2c"></path>
                                        </g>
                                        <g>
                                            <path
                                                d="m420 106v90c0 8.28-6.72 15-15 15s-15-6.72-15-15v-90c0-8.28 6.72-15 15-15s15 6.72 15 15z"
                                                fill="#6aa9ff"></path>
                                        </g>
                                        <g>
                                            <path
                                                d="m480 76v120c0 8.28-6.72 15-15 15s-15-6.72-15-15v-120c0-8.28 6.72-15 15-15s15 6.72 15 15z"
                                                fill="#ff435b"></path>
                                        </g>
                                        <path
                                            d="m270 46v195l-127-8-96.2-62.48c34.44-84.05 116.27-139.52 208.2-139.52 8.28 0 15 6.72 15 15z"
                                            fill="#fed843"></path>
                                        <path
                                            d="m480 256c0 119.33-92.66 216.8-210 224.5-4.96.33-9.96.5-15 .5-37.49 0-74.13-9.27-106.82-26.93l29.9-122.07 91.92-91h195c8.28 0 15 6.72 15 15z"
                                            fill="#ff7b4a"></path>
                                        <path d="m480 256c0 119.33-92.66 216.8-210 224.5v-239.5h195c8.28 0 15 6.72 15 15z"
                                            fill="#ff435b"></path>
                                        <path
                                            d="m270 241c-10.156 17.764-123.875 216.661-129.5 226.5-4.4 7.04-13.67 9.15-20.68 4.76-72.8-45.6-119.82-126.15-119.82-216.26 0-27.58 4.38-54.72 13.02-80.66 2.62-7.85 11.12-12.11 18.98-9.49.161.051 235.875 74.479 238 75.15z"
                                            fill="#7ed8f6"></path>
                                        <g>
                                            <path
                                                d="m512 196c0 8.28-6.72 15-15 15h-182c-8.28 0-15-6.72-15-15s6.72-15 15-15h182c8.28 0 15 6.72 15 15z"
                                                fill="#61729b"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Finance</h4>
                                <p class="categories-item-02__description">Fun & Challenging</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;"
                                    xml:space="preserve">
                                    <path style="fill:#F77E00;"
                                        d="M304.699,486.325c-16.184,0-32.367-6.16-44.688-18.478l-42.604-42.605  c-5.857-5.857-5.857-15.355,0.001-21.213c5.858-5.857,15.355-5.857,21.213,0l42.603,42.605  c12.943,12.943,34.008,12.943,46.951-0.002c12.945-12.943,12.945-34.008,0.002-46.953l-25.563-25.564  c-5.858-5.857-5.857-15.355,0-21.213c5.857-5.855,15.355-5.857,21.213,0l25.563,25.564c24.641,24.643,24.641,64.738-0.002,89.381  C337.068,480.165,320.883,486.325,304.699,486.325z">
                                    </path>
                                    <path style="fill:#FFDA2D;"
                                        d="M423.234,293.261L218.739,88.763c-3.266-3.266-7.856-4.844-12.439-4.281  c-4.584,0.564-8.653,3.211-11.029,7.17L24.86,375.675c-3.541,5.902-2.611,13.457,2.255,18.324L118,484.886  c2.892,2.891,6.732,4.393,10.611,4.393c2.649,0,5.317-0.699,7.712-2.137L420.346,316.73c3.961-2.375,6.605-6.445,7.17-11.029  C428.08,301.116,426.501,296.527,423.234,293.261z">
                                    </path>
                                    <g>
                                        <path style="fill:#FF9F00;"
                                            d="M320.989,191.015l-248.43,248.43L118,484.886c2.892,2.891,6.732,4.393,10.611,4.393   c2.649,0,5.317-0.699,7.712-2.137L420.346,316.73c3.961-2.375,6.605-6.445,7.17-11.029c0.565-4.584-1.015-9.174-4.281-12.439   L320.989,191.015z">
                                        </path>
                                        <path style="fill:#FF9F00;"
                                            d="M435.35,341.589c-3.839,0-7.678-1.465-10.606-4.395L174.806,87.257   c-5.858-5.857-5.858-15.355,0-21.213c5.857-5.858,15.355-5.858,21.213,0l249.938,249.938c5.857,5.857,5.857,15.355,0,21.213   C443.028,340.124,439.189,341.589,435.35,341.589z">
                                        </path>
                                        <path style="fill:#FF9F00;"
                                            d="M151.328,512.001c-3.839,0-7.677-1.463-10.607-4.393L4.393,371.277   c-5.857-5.857-5.857-15.355,0.001-21.213c5.858-5.857,15.355-5.857,21.213,0l136.328,136.332   c5.857,5.857,5.857,15.355-0.001,21.213C159.006,510.536,155.166,512.001,151.328,512.001z">
                                        </path>
                                    </g>
                                    <path style="fill:#D6E9FF;"
                                        d="M412.631,114.372c-3.839,0-7.678-1.465-10.607-4.393c-5.858-5.857-5.858-15.355,0-21.213  l84.369-84.369c5.857-5.857,15.355-5.857,21.213,0c5.858,5.857,5.858,15.356,0,21.213l-84.369,84.369  C420.308,112.907,416.47,114.372,412.631,114.372z">
                                    </path>
                                    <path style="fill:#B5D9FF;"
                                        d="M507.606,4.398c5.858,5.857,5.858,15.356,0,21.213l-84.369,84.369  c-2.929,2.928-6.768,4.393-10.606,4.393c-3.839,0-7.678-1.465-10.607-4.393L507.606,4.398z">
                                    </path>
                                    <path style="fill:#D6E9FF;"
                                        d="M321.732,91.655c-2.103,0-4.24-0.445-6.275-1.383c-7.523-3.473-10.807-12.383-7.336-19.906  L336.57,8.718c3.471-7.522,12.382-10.803,19.904-7.336c7.521,3.473,10.806,12.383,7.334,19.906l-28.447,61.648  C332.829,88.423,327.402,91.655,321.732,91.655z">
                                    </path>
                                    <path style="fill:#B5D9FF;"
                                        d="M435.361,205.263c-5.672,0-11.098-3.232-13.63-8.721c-3.471-7.521-0.187-16.434,7.336-19.904  l61.647-28.441c7.524-3.469,16.434-0.188,19.904,7.336c3.471,7.521,0.186,16.434-7.336,19.904l-61.646,28.441  C439.6,204.818,437.464,205.263,435.361,205.263z">
                                    </path>
                                    <g>
                                        <path style="fill:#F77E00;"
                                            d="M320.989,191.015l-21.213,21.213l124.968,124.967c2.929,2.93,6.767,4.395,10.606,4.395   s7.678-1.465,10.607-4.395c5.857-5.857,5.857-15.355,0-21.213L320.989,191.015z">
                                        </path>
                                        <path style="fill:#F77E00;"
                                            d="M140.721,507.609c2.93,2.93,6.768,4.393,10.607,4.393c3.838,0,7.678-1.465,10.606-4.393   c5.858-5.857,5.858-15.355,0.001-21.213l-68.163-68.164l-21.213,21.213L140.721,507.609z">
                                        </path>
                                    </g>

                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Marketing</h4>
                                <p class="categories-item-02__description">Promote Your Brands</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <path
                                            d="m116 131h-60c-8.284 0-15-6.716-15-15v-40c0-19.299 15.701-35 35-35h20c19.299 0 35 15.701 35 35v40c0 8.284-6.716 15-15 15z"
                                            fill="#ff9d21"></path>
                                        <path
                                            d="m457 471h-402c-30.327 0-55-24.673-55-55v-260c0-30.327 24.673-55 55-55h100.188l9.743-29.23c6.136-18.405 23.293-30.77 42.692-30.77h96.754c19.399 0 36.556 12.365 42.691 30.77l9.743 29.23h100.189c30.327 0 55 24.673 55 55v260c0 30.327-24.673 55-55 55z"
                                            fill="#ffde46"></path>
                                        <path
                                            d="m457 101h-100.188l-9.743-29.23c-6.136-18.405-23.293-30.77-42.692-30.77h-48.377v430h201c30.327 0 55-24.673 55-55v-260c0-30.327-24.673-55-55-55z"
                                            fill="#ff9d21"></path>
                                        <path
                                            d="m256 431c-79.953 0-145-65.047-145-145s65.047-145 145-145 145 65.047 145 145-65.047 145-145 145z"
                                            fill="#00429b"></path>
                                        <path d="m401 286c0-79.953-65.047-145-145-145v290c79.953 0 145-65.047 145-145z"
                                            fill="#00337a"></path>
                                        <path
                                            d="m256 396c-60.654 0-110-49.346-110-110s49.346-110 110-110 110 49.346 110 110-49.346 110-110 110z"
                                            fill="#3aafff"></path>
                                        <path d="m366 286c0-60.654-49.346-110-110-110v220c60.654 0 110-49.346 110-110z"
                                            fill="#008adf"></path>
                                        <circle cx="446" cy="176" fill="#ebe1dc" r="15"></circle>
                                        <path
                                            d="m86 191h-30c-8.284 0-15-6.716-15-15s6.716-15 15-15h30c8.284 0 15 6.716 15 15s-6.716 15-15 15z"
                                            fill="#f5f0eb"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Photography</h4>
                                <p class="categories-item-02__description">Take a Good Photo</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <path
                                            d="m416 330h-320c-52.383 0-95-42.617-95-95 0-24.194 9.109-47.232 25.648-64.87 12.489-13.318 28.32-22.627 45.701-27.073-.897-6.018-1.349-12.053-1.349-18.057 0-68.925 56.075-125 125-125 22.114 0 43.846 5.875 62.847 16.99 14.113 8.255 26.503 19.247 36.416 32.222 35.766-17.047 79.128-10.171 107.912 18.613 19.389 19.389 29.244 46.326 27.533 73.312 45.425 7.089 80.292 46.48 80.292 93.863 0 52.383-42.617 95-95 95z"
                                            fill="#e1f0ff"></path>
                                        <path
                                            d="m430.708 141.137c1.713-26.988-8.143-53.922-27.533-73.312-28.784-28.786-72.147-35.66-107.912-18.613-9.912-12.975-22.303-23.967-36.415-32.222-.941-.55-1.894-1.078-2.848-1.602v314.612h160c52.383 0 95-42.617 95-95 0-47.383-34.867-86.774-80.292-93.863z"
                                            fill="#bedcf0"></path>
                                        <path
                                            d="m316 482h-120c-8.284 0-15-6.716-15-15s6.716-15 15-15h120c8.284 0 15 6.716 15 15s-6.716 15-15 15z"
                                            fill="#5e54ac"></path>
                                        <path d="m316 452h-60v30h60c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#453d81">
                                        </path>
                                        <path
                                            d="m497 482h-121c-8.284 0-15-6.716-15-15s6.716-15 15-15h121c8.284 0 15 6.716 15 15s-6.716 15-15 15z"
                                            fill="#453d81"></path>
                                        <path
                                            d="m136 482h-121c-8.284 0-15-6.716-15-15s6.716-15 15-15h121c8.284 0 15 6.716 15 15s-6.716 15-15 15z"
                                            fill="#5e54ac"></path>
                                        <g>
                                            <path
                                                d="m166 452c-8.284 0-15-6.716-15-15v-62c0-8.284 6.716-15 15-15s15 6.716 15 15v62c0 8.284-6.716 15-15 15z"
                                                fill="#5e54ac"></path>
                                            <path d="m166 360v92c8.284 0 15-6.716 15-15v-62c0-8.284-6.716-15-15-15z"
                                                fill="#453d81"></path>
                                            <path
                                                d="m166 512c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"
                                                fill="#ffe278"></path>
                                            <path d="m166 422v90c24.813 0 45-20.187 45-45s-20.187-45-45-45z" fill="#ffb454">
                                            </path>
                                            <path
                                                d="m206 390h-80c-19.299 0-35-15.701-35-35v-140c0-19.299 15.701-35 35-35h80c19.299 0 35 15.701 35 35v140c0 19.299-15.701 35-35 35z"
                                                fill="#8bb9ff"></path>
                                            <path
                                                d="m206 180h-40v210h40c19.299 0 35-15.701 35-35v-140c0-19.299-15.701-35-35-35z"
                                                fill="#4793ff"></path>
                                            <circle cx="166" cy="255" fill="#ffe278" r="15"></circle>
                                            <circle cx="166" cy="315" fill="#ff6378" r="15"></circle>
                                            <path d="m181 255c0-8.284-6.716-15-15-15v30c8.284 0 15-6.716 15-15z"
                                                fill="#ffb454"></path>
                                            <path d="m166 300v30c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#d0004f">
                                            </path>
                                        </g>
                                        <g>
                                            <path
                                                d="m346 452c-8.284 0-15-6.716-15-15v-62c0-8.284 6.716-15 15-15s15 6.716 15 15v62c0 8.284-6.716 15-15 15z"
                                                fill="#5e54ac"></path>
                                            <path d="m346 360v92c8.284 0 15-6.716 15-15v-62c0-8.284-6.716-15-15-15z"
                                                fill="#453d81"></path>
                                            <path
                                                d="m346 512c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"
                                                fill="#ffe278"></path>
                                            <path d="m346 422v90c24.813 0 45-20.187 45-45s-20.187-45-45-45z" fill="#ffb454">
                                            </path>
                                            <path
                                                d="m386 390h-80c-19.299 0-35-15.701-35-35v-140c0-19.299 15.701-35 35-35h80c19.299 0 35 15.701 35 35v140c0 19.299-15.701 35-35 35z"
                                                fill="#8bb9ff"></path>
                                            <path
                                                d="m386 180h-40v210h40c19.299 0 35-15.701 35-35v-140c0-19.299-15.701-35-35-35z"
                                                fill="#4793ff"></path>
                                            <circle cx="346" cy="255" fill="#ffe278" r="15"></circle>
                                            <circle cx="346" cy="315" fill="#ff6378" r="15"></circle>
                                            <path d="m361 255c0-8.284-6.716-15-15-15v30c8.284 0 15-6.716 15-15z"
                                                fill="#ffb454"></path>
                                            <path d="m346 300v30c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#d0004f">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Data Science</h4>
                                <p class="categories-item-02__description">Data is Everything</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512 512" width="512">
                                    <g>
                                        <path
                                            d="m338.561 292.768c-11.191-17.048-21.599-33.445-25.598-51.768l-38.972-30h-145.781l-29.128 30c-3.999 18.323-14.407 34.72-25.598 51.768-7.926 12.079-15.51 24.673-21.613 38.232l25.245 30h247.031l35.99-30c-6.142-13.574-13.709-26.234-21.576-38.232z"
                                            fill="#ffd5cc"></path>
                                        <path
                                            d="m360.137 331c-6.141-13.574-13.709-26.234-21.575-38.232-11.192-17.048-21.6-33.445-25.599-51.768l-38.972-30h-67.969v150h118.124z"
                                            fill="#ffbfb3"></path>
                                        <path
                                            d="m428.444 337.592c-2.798-4.116-7.441-6.592-12.422-6.592h-364.151c-1.582 3.517-10.864 18.532-10.864 45.981-.688 38.965 10.532 84.613 31.597 126.728 2.549 5.083 7.734 8.291 13.418 8.291h75c6.456 0 11.841-4.116 13.958-9.831l-9.564-30.775 31.817 10.606h17.578l31.816-10.605-9.564 30.775c2.117 5.715 7.502 9.831 13.958 9.831h105c6.138 0 11.646-3.735 13.931-9.434l60-151c1.847-4.615 1.275-9.859-1.508-13.975z"
                                            fill="#4d578c"></path>
                                        <path
                                            d="m246.628 471.395-9.564 30.775c2.117 5.715 7.502 9.831 13.958 9.831h105c6.138 0 11.646-3.735 13.931-9.434l60-151c1.846-4.614 1.274-9.858-1.509-13.975-2.798-4.116-7.441-6.592-12.422-6.592h-210v151h8.789z"
                                            fill="#333e73"></path>
                                        <path
                                            d="m176.022 482h21.211l-40.605-40.605c-5.859-5.859-15.352-5.859-21.211 0s-5.859 15.352 0 21.211l39.564 39.564c.602-1.624 1.042-3.334 1.042-5.169v-15.001z"
                                            fill="#333e73"></path>
                                        <path
                                            d="m276.628 441.395c-5.859-5.859-15.352-5.859-21.211 0l-40.606 40.605h21.211v15c0 1.835.439 3.545 1.042 5.169l39.564-39.564c5.859-5.859 5.859-15.351 0-21.21z"
                                            fill="#1f2859"></path>
                                        <g>
                                            <path
                                                d="m386.022 271c-8.291 0-15-6.709-15-15v-30c0-8.291 6.709-15 15-15s15 6.709 15 15v30c0 8.291-6.709 15-15 15z"
                                                fill="#fed843"></path>
                                        </g>
                                        <g>
                                            <path
                                                d="m424.206 292.816c-5.859-5.859-5.859-15.352 0-21.211l21.211-21.211c5.859-5.859 15.352-5.859 21.211 0s5.859 15.352 0 21.211l-21.211 21.211c-5.859 5.86-15.352 5.86-21.211 0z"
                                                fill="#fed843"></path>
                                        </g>
                                        <path
                                            d="m341.022 136c0-.311-.159-.569-.178-.877.015-.302.167-.56.163-.866-.366-25.547-8.364-46.073-16.113-64.955-7.133-17.388-13.872-33.823-13.872-54.302 0-8.291-6.709-15-15-15h-30c-8.291 0-15 6.709-15 15v61c0 24.814-20.186 45-45 45s-45-20.186-45-45v-61c0-8.291-6.709-15-15-15h-30c-8.291 0-15 6.709-15 15 0 20.479-6.738 36.914-13.872 54.302-7.925 19.336-16.128 40.316-16.128 66.698 0 21.401 8.95 37.764 16.846 52.192 7.061 12.92 13.154 24.067 13.154 37.808 0 5.208-.879 10.129-1.941 15h213.882c-1.062-4.871-1.941-9.792-1.941-15 0-13.74 6.094-24.888 13.154-37.808 7.896-14.428 16.846-30.791 16.846-52.192z"
                                            fill="#f9b"></path>
                                        <path
                                            d="m311.022 226c0-13.74 6.094-24.888 13.154-37.808 7.896-14.429 16.846-30.791 16.846-52.192 0-.311-.159-.569-.178-.877.015-.302.167-.56.163-.866-.366-25.547-8.364-46.073-16.113-64.955-7.133-17.388-13.872-33.823-13.872-54.302 0-8.291-6.709-15-15-15h-30c-8.291 0-15 6.709-15 15v61c0 24.814-20.186 45-45 45v120h106.941c-1.062-4.871-1.941-9.792-1.941-15z"
                                            fill="#f69"></path>
                                        <circle cx="206.022" cy="286" fill="#ffbfb3" r="15"></circle>
                                        <path d="m221.022 286c0-8.284-6.716-15-15-15v30c8.284 0 15-6.716 15-15z"
                                            fill="#fa9"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Health & Fitness</h4>
                                <p class="categories-item-02__description">Invest to Your Body</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="512" viewBox="0 0 512.01 512.01"
                                    width="512">
                                    <g>
                                        <path
                                            d="m431.005 192c0 105.32-85.68 191-191 191s-191-85.68-191-191c0-105.87 85.68-192 191-192s191 86.13 191 192z"
                                            fill="#425796"></path>
                                        <path d="m431.005 192c0 105.32-85.68 191-191 191v-383c105.32 0 191 86.13 191 192z"
                                            fill="#283758"></path>
                                        <circle cx="240.005" cy="192" fill="#eef4ff" r="55"></circle>
                                        <path d="m295.005 192c0 30.33-24.67 55-55 55v-110c30.33 0 55 24.67 55 55z"
                                            fill="#d9e6fc"></path>
                                        <path
                                            d="m463.005 256v168c0 8.28-6.72 15-15 15s-15-6.72-15-15v-84.63l-130 33.62v91.01c0 8.28-6.72 15-15 15s-15-6.72-15-15v-168c0-6.88 4.68-12.88 11.36-14.55l83.64-20.91 76.36-19.09c9.45-2.36 18.64 4.79 18.64 14.55z"
                                            fill="#ffe278"></path>
                                        <path
                                            d="m463.005 256v168c0 8.28-6.72 15-15 15s-15-6.72-15-15v-84.63l-65 16.81v-95.64l76.36-19.09c9.45-2.36 18.64 4.79 18.64 14.55z"
                                            fill="#ffb454"></path>
                                        <path
                                            d="m256.005 417c-25.916 0-47 21.084-47 47 0 12.496 4.81 24.396 13.544 33.508 18.534 19.334 48.373 19.34 66.912 0 8.734-9.111 13.544-21.012 13.544-33.508 0-25.916-21.084-47-47-47z"
                                            fill="#ffb454"></path>
                                        <circle cx="416.005" cy="432" fill="#ff7d47" r="47"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Music</h4>
                                <p class="categories-item-02__description">Major or Minor</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!-- Categories Item Start -->
                    <div class="categories-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <a class="categories-item-02__link" href="#">
                            <div class="categories-item-02__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve">
                                    <path style="fill:#1689FC;"
                                        d="M410.797,205.3c-2.695-3.6-7.2-5.7-11.697-5.7H112.899c-4.497,0-9.001,2.1-11.697,5.7  c-3.003,3.6-3.904,8.399-2.703,12.599l22.8,94.2c0.901,3.3,2.999,6.299,5.698,8.399C165.099,348.999,210.399,363.1,256,363.1  s90.901-14.101,129.001-42.601c2.699-2.1,4.797-5.099,5.698-8.399l22.8-94.2C414.701,213.699,413.8,208.9,410.797,205.3z">
                                    </path>
                                    <path style="fill:#136EF1;"
                                        d="M413.5,217.899l-22.8,94.2c-0.901,3.3-2.999,6.299-5.698,8.399  C346.901,348.999,301.601,363.1,256,363.1V199.6h143.101c4.497,0,9.001,2.1,11.697,5.7C413.8,208.9,414.701,213.699,413.5,217.899z">
                                    </path>
                                    <path style="fill:#18A7FC;"
                                        d="M503.599,152.5l-241-120c-2.098-0.901-4.197-1.5-6.599-1.5s-4.501,0.599-6.599,1.5l-241,120  C3.3,155.2,0,160.3,0,166s3.3,10.8,8.401,13.5l241,120c2.098,0.899,4.197,1.5,6.599,1.5c2.402,0,4.501-0.601,6.599-1.5l241-120  C508.7,176.8,512,171.7,512,166S508.7,155.2,503.599,152.5z">
                                    </path>
                                    <path style="fill:#57555C;"
                                        d="M466,331c-8.291,0-15-6.709-15-15V181c0-8.291,6.709-15,15-15s15,6.709,15,15v135  C481,324.291,474.291,331,466,331z">
                                    </path>
                                    <path style="fill:#FCBF29;"
                                        d="M466,481c-2.93,0-5.83-0.85-8.35-2.549C453.9,475.932,421,452.934,421,421s32.9-54.932,36.65-57.451  c5.039-3.398,11.66-3.398,16.699,0C478.1,366.068,511,389.066,511,421s-32.9,54.932-36.65,57.451C471.83,480.15,468.93,481,466,481z  ">
                                    </path>
                                    <g>
                                        <path style="fill:#1689FC;"
                                            d="M466,391c-24.814,0-45-20.186-45-45s20.186-45,45-45s45,20.186,45,45S490.814,391,466,391z">
                                        </path>
                                        <path style="fill:#1689FC;"
                                            d="M503.599,152.5C508.7,155.2,512,160.3,512,166s-3.3,10.8-8.401,13.5l-241,120   c-2.098,0.899-4.197,1.5-6.599,1.5V31c2.402,0,4.501,0.599,6.599,1.5L503.599,152.5z">
                                        </path>
                                        <path style="fill:#1689FC;"
                                            d="M330.099,150.099C310.302,170.2,283.898,181,256,181s-54.302-10.8-74.099-30.901   c-5.999-5.7-5.999-15.3,0-21c5.698-5.999,15.3-5.999,20.999,0c14.099,14.101,33.6,21.301,53.101,21.301s39.001-7.2,53.101-21.301   c5.698-5.999,15.3-5.999,20.999,0C336.098,134.799,336.098,144.399,330.099,150.099z">
                                        </path>
                                    </g>
                                    <path style="fill:#136EF1;"
                                        d="M330.099,150.099C310.302,170.2,283.898,181,256,181v-30.601c19.501,0,39.001-7.2,53.101-21.301  c5.698-5.999,15.3-5.999,20.999,0C336.098,134.799,336.098,144.399,330.099,150.099z">
                                    </path>
                                </svg>
                            </div>
                            <div class="categories-item-02__info">
                                <h4 class="categories-item-02__name">Teaching & Academics</h4>
                                <p class="categories-item-02__description">High Education Level</p>
                            </div>
                        </a>
                    </div>
                    <!-- Categories Item End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Course Section Start -->
    <div class="courses-section section-padding-02">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">

                    <!-- Section Title Start -->
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title"> <span class="orange">Our</span> Courses </h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-lg-6">
                    <div class="courses-tab-menu" data-aos="fade-up" data-aos-duration="1000">
                        <ul class="nav justify-content-lg-end">
                            <a class="active"  href="{{route('all_course')}}">All Courses</a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content course-tab-active swiper-button-style" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-pane fade show active" id="tab1">

                    <div class="swiper">
                        <div class="swiper-wrapper">
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
                                                    <span class="course-info__badge-text badge-all">{{ $course->level }}</span>
                                                    <h3 class="course-info__title">
                                                        <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                                                    </h3>
                                                    <a href="#" class="course-info__instructor">{{ $course->instructor ?? 'Unknown' }}</a>
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
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Add Navigation -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="tab2">

                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-11.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="hot">Featured</span>
                                            <span class="onsale">-39%</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Mastering Data Modeling
                                                Fundamentals</a></h3>
                                        <a href="#" class="course-info__instructor">Owen Christ</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$46.<small class="separator">00</small></span>
                                            <span class="regular-price">$76.<small class="separator">00</small></span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 80%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-12.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="onsale">-51%</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Fundamentals of
                                                Accounting</a></h3>
                                        <a href="#" class="course-info__instructor">Owen Christ</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$15.<small class="separator">00</small></span>
                                            <span class="regular-price">$31.<small class="separator">00</small></span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 80%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-1.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-all">All Levels</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Successful Negotiation:
                                                Master Your Negotiating Skills</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$39.<small class="separator">00</small></span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 80%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-2.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-all">All Levels</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Time Management Mastery:
                                                Do More, Stress Less</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$29.<small class="separator">00</small></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-13.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="hot">Featured</span>
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Adobe Illustrator CC –
                                                Essentials Training Course0</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="free">Free</span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 100%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-6.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Consulting Approach to
                                                Problem Solving</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="free">Free</span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 100%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-3.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Angular – The Complete
                                                Guide (2020 Edition)</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$84.<small class="separator">00</small></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-5.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-all">All Levels</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">The Business Intelligence
                                                Analyst Course 2020</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="free">Free</span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 80%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-6.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-all">All Levels</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Become a Product Manager
                                                | Learn the Skills & Get the Job</a></h3>
                                        <a href="#" class="course-info__instructor">parra</a>
                                        <div class="course-info__price">
                                            <span class="free">Free</span>
                                        </div>
                                        <div class="course-info__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 100%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->

                            </div>
                            <div class="swiper-slide">

                                <!-- Course Start -->
                                <div class="course-item">
                                    <div class="course-header">
                                        <div class="course-header__thumbnail ">
                                            <a href="course-detail.php"><img src="{{ asset("front/assets/images/courses/courses-7.jpg")}}"
                                                    alt="courses" width="258" height="173"></a>
                                        </div>
                                    </div>
                                    <div class="course-info">
                                        <span class="course-info__badge-text badge-beginner">Beginner</span>
                                        <h3 class="course-info__title"><a href="course-detail.php">Mechanical Engineering
                                                and Electrical Engineering Explained</a></h3>
                                        <a href="#" class="course-info__instructor">Oliver Porter</a>
                                        <div class="course-info__price">
                                            <span class="sale-price">$84.<small class="separator">00</small></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course End -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px" viewBox="0 0 50 40">
                                            <path d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z"></path>
                                            <path d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016  ((*50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z"></path>
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
        <img class="testimonial-section__shape-04" data-depth="0.7" src="{{ asset("front/assets/images/shape/edumall-shape-01.png") }}"
            alt="Shape" width="179" height="178">

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
                                    <img src="{{ asset("front/assets/images/home-university-image-campus-life.jpg")}}" alt="Campus" width="570"
                                        height="399">
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
                                    <span class="meta-action"><i class="fas fa-eye"></i> 4,036 views</span>
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
            

            <!-- Page Pagination Start -->
            <div class="page-pagination">
                <ul class="pagination justify-content-center">
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                </ul>
            </div>
            <!-- Page Pagination End -->

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

                    <!-- Partners Logo Wrapper Start -->
                    <div class="partner-logo-wrapper-02" data-aos="fade-up" data-aos-duration="1000">

                        <!-- Partners Logo Start -->
                        <div class="partner-logo">
                            <div class="partner-logo__logo">
                                <img src="{{ asset("front/assets/images/partners-logo/client-logo-01.jpg")}}" alt="Logo" width="68" height="92">
                            </div>
                        </div>
                        <!-- Partners Logo End -->

                        <!-- Partners Logo Start -->
                        <div class="partner-logo">
                            <div class="partner-logo__logo">
                                <img src="{{ asset("front/assets/images/partners-logo/client-logo-04.jpg")}}" alt="Logo" width="78" height="91">
                            </div>
                        </div>
                        <!-- Partners Logo End -->

                        <!-- Partners Logo Start -->
                        <div class="partner-logo">
                            <div class="partner-logo__logo">
                                <img src="{{ asset("front/assets/images/partners-logo/client-logo-05.jpg")}}" alt="Logo" width="76" height="91">
                            </div>
                        </div>
                        <!-- Partners Logo End -->

                        <!-- Partners Logo Start -->
                        <div class="partner-logo">
                            <div class="partner-logo__logo">
                                <img src="{{ asset("front/assets/images/partners-logo/client-logo-06.jpg")}}" alt="Logo" width="99" height="71">
                            </div>
                        </div>
                        <!-- Partners Logo End -->

                        
                        <!-- Partners Logo End -->

                    </div>
                    <!-- Partners Logo Wrapper End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Partners End -->


    <!-- slider  -->


    <div class="  logo-carousel ">
        <h2>We Are Associated With</h2>

        <div class="carousel-wrapper">
            <button class="carousel-arrow left" onclick="slideLeft()">&#8592;</button>

            <div class="carousel-view " id="carouselView">
                <div class="carousel-track" id="carouselTrack">
                    <!-- Logos will be cloned dynamically -->
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 1" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 2" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 3" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 4" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 5" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 6" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 7" /></div>
                    <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 8" /></div>
                </div>
            </div>

            <button class="carousel-arrow right" onclick="slideRight()">&#8594;</button>
        </div>
    </div>
@endsection