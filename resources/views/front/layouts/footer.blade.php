<div class="logo-carousel">
    <h2 class="section-title__title-03">We Are Associated With</h2>
    <div class="carousel-wrapper">
        <button class="carousel-arrow left" onclick="slideLeft()">
            <i class="fas fa-angle-left"></i>
        </button>
        <div class="carousel-view" id="carouselView">
            <div class="carousel-track" id="carouselTrack">
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 1" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 2" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 3" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 4" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 5" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 6" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/ccsu.png") }}" alt="Logo 7" />
                </div>
                <div class="carousel-item-custom"><img src="{{ asset("front/assets/images/aktu.png") }}" alt="Logo 8" />
                </div>
            </div>
        </div>
        <button class="carousel-arrow right" onclick="slideRight()">
            <i class="fas fa-angle-right"></i>
        </button>
    </div>
</div>
<style>
    .carousel-arrow {
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
        color: black;
        /* Initial arrow color */
        padding: 10px;
        border-radius: 50%;
        /* Make the button circular */
        transition: all 0.3s ease;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .carousel-arrow:hover {
        background-color: #007BFF;
        /* Hover background: blue */
        color: white;
        /* Hover icon color: white */
    }
</style>

<div class="section-padding-0">
    <div class="">
        <div class="newsletter-section scene">
            <div class="newsletter-wrapper d-flex">
                <div class="newsletter__content">
                    <h3 class="newsletter__title"> <span class="orange">Subscribe Our</span> <span
                            class="text-white">Newsletter</span> </h3>
                    <p class=" text-white">Get the latest updates, tips, and exclusive <br> offers straight
                        to your inbox.
                    </p>
                </div>
                <div class="newsletter__form">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('news_letter') }}" method="post">
                        @csrf
                        <input type="text" name="email" placeholder="Your e-mail" value="{{ old('email') }}">
                        <button class="btn btn-orange btn-hover-primary">Subscribe</button>

                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="newsletter-section__shape-01" data-depth="-0.4"></div>
            <div class="newsletter-section__shape-02" data-depth="0.4"></div>
            <div class="newsletter-section__shape-03" data-depth="-0.5"></div>
            <div class="newsletter-section__shape-04" data-depth="0.5"></div>
        </div>
    </div>
</div>
<div class="footer-section">
    <div class="footer-widget-area section-padding-01">
        <div class="container">
            <div class="row gy-6">
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <a href="{{url('/')}}" class="footer-widget__logo"><img
                                src="{{ asset("front/assets/images/careercracker.png")}}" alt="Logo" width="150"
                                height="32"></a>
                        <div class="footer-widget__info">
                            <span class="title">We understand that each student's situation and needs
                                are unique to them. Tell us more about what you're looking
                                for, and we will get back to you soon.
                            </span>
                        </div>
                        <div class="footer-widget__info">
                            <p> <strong>Address:</strong> Mumbai India</p>
                            <p> <Strong>Email:</Strong> info@careercracker.in, info.careercracker@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row gy-6">
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Quick Links</h4>
                                <ul class="footer-widget__link">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('all_course')}}">Courses</a></li>
                                    <li><a href="{{route('blogs')}}">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Links</h4>
                                <ul class="footer-widget__link">
                                    <li><a href="#">News & Blogs</a></li>
                                    <li><a href="#">Library</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Partners</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Support</h4>
                                <ul class="footer-widget__link">
                                    <li><a href="{{route('faqs')}}">FAQs</a></li>
                                    <li><a href="{{route('career')}}">Career</a></li>
                                    <li><a href="#">Forum</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper text-center">
                <ul class="footer-widget__link flex-row gap-8 justify-content-center">
                    <li><a href="{{route('termcondition')}}">Terms of Use</a></li>
                    <li><a href="{{route('privacypolicy')}}">Privacy Policy</a></li>
                </ul>
                <p class="footer-widget__copyright mt-0">&copy; 2025 <span> Career Cracker. </span> Designed by <a
                        href="hyperscripts.io">Hyperscripts</a></p>
            </div>
        </div>
    </div>
</div>