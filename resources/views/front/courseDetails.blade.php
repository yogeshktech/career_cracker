@extends('front.layouts.layout')

@section('content')
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">

    <div class="page-banner bg-color-11">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('all_course') }}">Courses</a></li>
                        <li class="breadcrumb-item active">{{ $course->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="tutor-course-top-info section-padding-01 bg-color-11">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tutor-course-top-info__content">
                        <div class="tutor-course-top-info__badges">
                            @if ($course->mrp > $course->sale_price && $course->mrp > 0)
                                <span class="onsale">{{ round((($course->mrp - $course->sale_price) / $course->mrp) * 100) }}% Off</span>
                            @endif
                            <a class="badges-category" href="{{ route('all_course', ['categories' => $course->category_id ?? '']) }}">{{ $course->category->name ?? ''}}</a>
                        </div>
                        <h1 class="tutor-course-top-info__title">{{ $course->title }}</h1>
                        <div class="tutor-course-top-info__meta">
                            <div class="tutor-course-top-info__meta-instructor">
                                <div class="instructor-avatar">
                                    <img src="{{ asset($course->thumbnail) }}" alt="Instructor" width="36" height="36" loading="lazy">
                                </div>
                                <div class="instructor-name">{{ $course->faculties->first()->name ?? $course->creator->name ?? 'Instructor' }}</div>
                            </div>
                            <div class="tutor-course-top-info__meta-update">Updated {{ $course->updated_at->format('F Y') }}</div>
                        </div>
                        <div class="tutor-course-top-info__meta">
                            <div class="tutor-course-top-info__meta-rating">
                                <div class="rating-average"><strong>{{ number_format($course->rating / 20, 1) }}</strong> /5</div>
                                <div class="rating-star">
                                    <div class="rating-label" style="width: {{ $course->rating }}%;"></div>
                                </div>
                                <div class="rating-count">({{ $course->reviews_count }})</div>
                            </div>
                            {{-- <div class="tutor-course-top-info__meta-action"><i class="meta-icon fas fa-user-alt"></i> </div> --}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="d-flex container custom-container mb-4">
    @if (!empty(trim(strip_tags($course->overview))))
        <a href="#overview" class="slider-caption-04__btn btn btn-orange rounded-button">Overview</a>
    @endif
    @if (!empty(trim(strip_tags($course->highlights))))
        <a href="#highlight" class="slider-caption-04__btn btn btn-orangee rounded-button">Course Highlights</a>
    @endif
    @if (!empty(trim(strip_tags($course->details))))
        <a href="#detail" class="slider-caption-04__btn btn btn-orangee rounded-button">Course Details</a>
    @endif
    @if (!empty(trim(strip_tags($course->why_choose_us))))
        <a href="#choose" class="slider-caption-04__btn btn btn-orangee rounded-button">Why Choose Us?</a>
    @endif
</div>
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="container custom-container">
            <div class="row gy-10">
                <div class="col-lg-8">
                    <div class="tutor-course-main-segment">
                        <div class="tutor-course-segment">
                            <h4 class="tutor-course-segment__title" id="overview">Overview</h4>
                            <div class="tutor-course-segment__content-wrap">
                                <p>{!! $course->overview !!}</p>
                            </div>
                        </div>
                        <div class="tutor-course-segment">
                             @if (!empty(trim(strip_tags($course->highlights))))
                            <h4 class="tutor-course-segment__title" id="highlight">Course Highlights</h4>
                            <div class="margin-left">
                                <p>{!! $course->highlights !!}</p>
                            </div>
                            @endif
                        </div>
                        <div class="tutor-course-segment">
                             @if (!empty(trim(strip_tags($course->details))))
                            <div class="tutor-course-segment__header" id="detail">
                                <h4 class="tutor-course-segment__title">Course Details</h4>
                            </div>
                            <p>{!! $course->details !!}</p>
                            @endif
                        </div>
                        @if (!empty(trim(strip_tags($course->why_choose_us))))
                        <h4 class="tutor-course-segment__title mt-4" id="choose">Why Choose This Course</h4>
                        <p>{!! $course->why_choose_us !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-stic">
                        <div class="tutor-course-sidebar">
                            <div class="tutor-course-price-preview">
                                <div class="tutor-course-price-preview__thumbnail">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" loading="lazy">
                                    </div>
                                </div>
                                <div class="tutor-course-price-preview__price">
                                    <div class="tutor-course-price">
                                        <span class="sale-price">₹{{ number_format($course->sale_price, 2) }}</span>
                                        @if ($course->mrp > $course->sale_price)
                                            <span class="regular-price text-muted">₹{{ number_format($course->mrp, 2) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tutor-course-price-preview__meta">
                                    <ul class="tutor-course-meta-list">
                                        <li>
                                            <div class="label"><i class="fas fa-play-circle"></i> Lectures</div>
                                            <div class="value">{{ $course->total_lectures }} lectures</div>
                                        </li>
                                       
                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Language</div>
                                            <div class="value">{{ $course->language->name ?? ''}}</div>
                                        </li>

                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Regular Classes begin from</div>
                                            <div class="value">{{ $course->regular_class_date ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Max CTC</div>
                                            <div class="value">{{ $course->max_lpa ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Avg CTC</div>
                                            <div class="value">{{ $course->min_lpa ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Free Demo Starts On</div>
                                            <div class="value">{{ $course->pre_demo_start_date ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="label"><i class="fas fa-globe"></i> Free Demo Ends On</div>
                                            <div class="value">{{ $course->pre_demo_end_date ?? ''}}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tutor-course-price-preview__btn">
                                    @if ($course->is_saleable)
                                        <form action="{{ route('cart.add', $course->id) }}" method="POST" class="mb-2">
                                            @csrf
                                            <button type="submit" class="button btn btn-yellow btn-hover-secondary w-100">Add to Cart</button>
                                        </form>
                                        <form action="{{ route('cart.buy', $course->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Buy Now</button>
                                        </form>
                                    @else
                                        <div class="alert alert-info text-center">
                                            Next Bactch launching Shortly
                                        </div>
                                    @endif
                                </div>
                                <section class="reviews">
                                    <h2 class="section-title">Customer Reviews</h2>
                                    <div class="review-container">
                                        @forelse ($course->reviews as $review)
                                            <div class="review-box">
                                                <div class="review-header">
                                                    <strong>{{ $review->name }}</strong>
                                                    <div class="stars">
                                                        {!! str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) !!}
                                                    </div>
                                                </div>
                                                <p class="review-text">{{ $review->comment }}</p>
                                            </div>
                                        @empty
                                            <p class="text-center">No reviews yet. Be the first to review this course!</p>
                                        @endforelse
                                    </div>
                                </section>
                                <style>
                                    .reviews {
                                max-width: 800px;
                                margin: 40px auto;
                                padding: 20px;
                                font-family: Arial, sans-serif;
                                }

                                .section-title {
                                font-size: 28px;
                                text-align: center;
                                margin-bottom: 20px;
                                }

                                .review-container {
                                max-height: 456px; /* Set your desired scroll height */
                                overflow-y: auto;
                                padding-right: 10px; /* space for scrollbar */
                                }

                                .review-box {
                                background: #f9f9f9;
                                border-left: 5px solid #4CAF50;
                                padding: 20px;
                                margin-bottom: 20px;
                                border-radius: 8px;
                                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                                }

                                .review-header {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 10px;
                                }

                                .stars {
                                color: #FFD700;
                                font-size: 18px;
                                }

                                .review-text {
                                font-size: 16px;
                                line-height: 1.5;
                                color: #333;
                                }

                                /* Optional: nice scrollbar styling (Webkit-based browsers only) */
                                .review-container::-webkit-scrollbar {
                                width: 8px;
                                }
                                .review-container::-webkit-scrollbar-thumb {
                                background-color: #ccc;
                                border-radius: 4px;
                                }

                                </style>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="courses-section section-padding-02">
        
        <div class="container custom-container">

            <div class="row">
                <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title-03"><span class="orange">Related</span> Courses</h2>
                    </div>
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <div class="courses-tab-menu" data-aos="fade-up" data-aos-duration="1000">
                        <ul class="nav justify-content-lg-end">
                            {{-- <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">All</button></li> --}}
                        </ul>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    {{-- <div class="">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="section-title__title-03"><span class="orange">Upcoming</span> Batches </h2>
                        </div>
                    </div> --}}
                    @foreach ($all_course as $course)
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
{{-- 
            <div class="tab-content course-tab-active swiper-button-style" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-pane fade show active" id="tab1">
                    <div class="swiper related Angelfire is a heavy metal band formed in 1983, known for albums like *Balls to the Wall* and *Metal Heart*. We'll add an "Add to Cart" button to each related course card to allow users to add courses to their cart directly from the related courses section.

                    <div class="swiper related-courses-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($all_course as $course)
                                <div class="swiper-slide">
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail">
                                                <a href="{{ route('courses.show', $course->id) }}">
                                                    <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" width="258" height="173" loading="lazy">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <h3 class="course-info__title">
                                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                                            </h3>
                                            <a href="#" class="course-info__instructor">{{ $course->faculties->first()->name ?? $course->creator->name ?? 'Instructor' }}</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">₹{{ number_format($course->sale_price, 2) }}</span>
                                            </div>
                                            <div class="course-info__rating">
                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: {{ $course->rating }}%;"></div>
                                                </div>
                                                <span>({{ $course->reviews_count }})</span>
                                            </div>
                                            @if ($course->is_saleable)
                                                <form action="{{ route('cart.add', $course->id) }}" method="POST" class="mt-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary btn-hover-primary w-100">Add to Cart</button>
                                                </form>
                                            @else
                                                <div class="alert alert-info text-center mt-2">
                                                    Coming Soon
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>

                
            </div> --}}
        </div>
    </div>

   

    <!-- Include AOS JS, jQuery, Bootstrap JS, and Swiper JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init();

            // Initialize Related Courses Swiper
            new Swiper('.related-courses-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    576: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    992: { slidesPerView: 4 },
                },
            });

            // Initialize Logo Carousel Swiper
            new Swiper('.logo-carousel-swiper', {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    576: { slidesPerView: 3 },
                    768: { slidesPerView: 4 },
                    992: { slidesPerView: 5 },
                },
            });

            // Star Rating Logic
            const stars = document.querySelectorAll('#rating .star');
            const ratingInput = document.getElementById('rating-value');
            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const value = star.getAttribute('data-value');
                    ratingInput.value = value;
                    stars.forEach(s => {
                        s.classList.toggle('selected', s.getAttribute('data-value') <= value);
                    });
                });
            });
        });
    </script>
@endsection