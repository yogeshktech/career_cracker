<div class="section-padding-0">
    <div class="">
        <div class="newsletter-section scene">
            <!-- Newsletter Wrapper Start -->
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
            <!-- Newsletter Wrapper End -->
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
                            <p> <strong>Address:</strong> Delhi Address</p>
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
                                    <li><a href="#">Become A Teacher</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Links</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="#">News & Blogs</a></li>
                                    <li><a href="#">Library</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Partners</a></li>
                                    <li><a href="{{route('career')}}">Career</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Support</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="">FAQs</a></li>
                                    <li><a href="#">Forum</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Widget Area End -->

    <!-- Footer Copyright Area End -->
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper text-center">
                <ul class="footer-widget__link flex-row gap-8 justify-content-center">
                    <li><a href="">Terms of Use</a></li>
                    <li><a href="">Privacy Policy</a></li>
                </ul>
                <p class="footer-widget__copyright mt-0">&copy; 2025 <span> Career Cracker. </span> Designed by <a
                        href="hyperscripts.io">Hyperscripts</a></p>
            </div>
        </div>
    </div>
    <!-- Footer Copyright Area End -->

</div>
<!-- Footer End -->