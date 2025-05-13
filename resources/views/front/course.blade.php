@extends('front.layouts.layout')

@section('content')
    <!-- Include AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Courses</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu"
        style="background-image: url({{ asset('front/assets/images/mobile-bg.jpg') }});">
        <div class="offcanvas-header bg-white">
            <div class="offcanvas-logo">
                <a class="offcanvas-logo__logo" href="{{ url('') }}"><img
                        src="{{ asset('front/assets/images/careercracker.png') }}" alt="Logo"></a>
            </div>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
        </div>
        <div class="offcanvas-body">
            <nav class="canvas-menu">
                <ul class="offcanvas-menu">
                    <li><a class="active" href="{{ url('') }}"><span>Home</span></a></li>
                    <li><a href="{{ route('all_course') }}"><span>Courses</span></a></li>
                    <li><a href="{{ route('blogs') }}"><span>Blog</span></a></li>
                    <li><a href="#"><span>Pages</span></a></li>
                    <li><a href="#"><span>Features</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="courses-section section-padding-01">
        <div class="container">
            <div class="row gy-10 flex-row-reverse">
                <div class="col-lg-9">
                    <div class="archive-filter-bars">
                        <div class="archive-filter-bar">
                            <p>We found <span>{{ $totalCourses }}</span> courses available for you</p>
                        </div>
                        <div class="archive-filter-bar">
                            <div class="filter-bar-wrapper">
                                <span>See</span>
                                <ul class="nav">
                                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i
                                                class="fas fa-th"></i></button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#list"><i
                                                class="fas fa-bars"></i></button></li>
                                </ul>
                                <button class="btn btn-light btn-hover-primary collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFilter">
                                    <i class="fas fa-filter"></i> Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="filter-collapse collapse" id="collapseFilter">
                        <div class="card card-body">
                            <form id="filterForm">
                                <div class="row row-cols-xl-5 gy-6">
                                    <!-- Categories -->
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="widget-filter">
                                            <h4 class="widget-filter__title">Categories</h4>
                                            <div class="widget-filter__wrapper widgetScroll">
                                                <ul class="widget-filter__list">
                                                    @foreach ($categories as $category)
                                                        <li>
                                                            <div class="widget-filter__item">
                                                                <input type="checkbox" id="category{{ $category->id }}"
                                                                    name="categories[]" value="{{ $category->id }}">
                                                                <label for="category{{ $category->id }}">{{ $category->name }}
                                                                    <span>({{ $category->courses()->where('status', 'published')->count() }})</span></label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- Grid View -->
                        <div class="tab-pane fade show active" id="grid">
                            @include('front.partials.course-grid')
                        </div>
                        <!-- List View -->
                        <div class="tab-pane fade" id="list">
                            @include('front.partials.course-list')
                        </div>
                    </div>

                    <div class="page-pagination">
                        {{ $courses->links() }}
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar-widget-wrapper">
                        <div class="sidebar-widget-wrap bg-color-10">
                            <h4 class="sidebar-widget-wrap__title">Filter by category</h4>
                            <div class="widget-filter">
                                <div class="widget-filter__wrapper">
                                    <ul class="widget-filter__list">
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="category{{ $category->id }}"
                                                        name="categories[]" value="{{ $category->id }}">
                                                    <label for="category{{ $category->id }}">{{ $category->name }}
                                                        <span>({{ $category->courses()->where('status', 'published')->count() }})</span></label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03 "> Courses</h2>
        </div>
        <div class="row logo-section">
            <div class="col-3">
                <img src="{{ asset('front/assets/images/java.png')}}" alt="Logo 1" class="logo">
                <h6>Java</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/net.png')}}" alt="Logo 2" class="logo">
                <h6>.Net</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/python.png')}}" alt="Logo 3" class="logo">
                <h6>Python</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/database.png')}}" alt="Logo 4" class="logo">
                <h6>Database</h6>
            </div>
        </div>
        <div class="row logo-section">
            <div class="col-3">
                <img src="{{ asset('front/assets/images/java.png')}}" alt="Logo 1" class="logo">
                <h6>Java</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/net.png')}}" alt="Logo 2" class="logo">
                <h6>.Net</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/python.png')}}" alt="Logo 3" class="logo">
                <h6>Python</h6>
            </div>
            <div class="col-3">
                <img src="{{ asset('front/assets/images/database.png')}}" alt="Logo 4" class="logo">
                <h6>Database</h6>
            </div>
        </div>
    </div>
    <!-- Courses Hover End -->
    <div id="course-hover">
        <div class="course-item-hover">
            <div class="course-item-hover__category">
                <a href="#">Communications</a>
            </div>
            <h2 class="course-item-hover__title"><a href="course-detail.php">Successful Negotiation: Master Your Negotiating
                    Skills</a></h2>
            <div class="course-item-hover__rating">
                <div class="rating-star">
                    <div class="rating-label" style="width: 100%;"></div>
                </div>
                <div class="rating-average">
                    <span class="rating-average__average">5.0</span>
                    <span class="rating-average__total">/5</span>
                </div>
                <p class="course-item-hover__rating-count">(2 ratings)</p>
            </div>
            <div class="course-item-hover__meta">
                <span>5 Lessons</span>
                <span>2.3 hours</span>
                <span>All Levels</span>
            </div>
            <div class="course-item-hover__benefits">
                <h6 class="course-item-hover__benefits-title">What you'll learn</h6>
                <ul class="course-item-hover__benefits-list">
                    <li>Negotiate effectively and fairly to make 1000s more than they would otherwise</li>
                    <li>Be confident in starting and finishing a negotiation</li>
                    <li>Use smart tactics to increase their bargaining power</li>
                    <li>Develop mental and emotional strength to keep pushing until they get a great price</li>
                    <li>Use negotiating skills in both personal and professional situations</li>
                </ul>
            </div>
            <div class="course-item-hover__btn">
                <a class="btn btn-primary btn-hover-secondary w-100" href="#">Add to cart</a>
                <a class="btn-link" href="#"><i class="far fa-heart"></i> Add to wishlist</a>
            </div>
        </div>
    </div>
    <!-- Courses Hover End -->
    <!-- Courses List Hover End -->
    <div id="course-list-hover">
        <div class="course-item-hover">
            <div class="course-item-hover__category">
                <a href="#">Communications</a>
            </div>
            <h2 class="course-item-hover__title"><a href="course-detail.php">Successful Negotiation: Master Your Negotiating
                    Skills</a></h2>
            <div class="course-item-hover__rating">
                <div class="rating-star">
                    <div class="rating-label" style="width: 100%;"></div>
                </div>
                <div class="rating-average">
                    <span class="rating-average__average">5.0</span>
                    <span class="rating-average__total">/5</span>
                </div>
                <p class="course-item-hover__rating-count">(2 ratings)</p>
            </div>
            <div class="course-item-hover__meta">
                <span>5 Lessons</span>
                <span>2.3 hours</span>
                <span>All Levels</span>
            </div>
            <div class="course-item-hover__benefits">
                <h6 class="course-item-hover__benefits-title">What you'll learn</h6>
                <ul class="course-item-hover__benefits-list">
                    <li>Negotiate effectively and fairly to make 1000s more than they would otherwise</li>
                    <li>Be confident in starting and finishing a negotiation</li>
                    <li>Use smart tactics to increase their bargaining power</li>
                    <li>Develop mental and emotional strength to keep pushing until they get a great price</li>
                    <li>Use negotiating skills in both personal and professional situations</li>
                </ul>
            </div>
            <div class="course-item-hover__btn">
                <a class="btn btn-primary btn-hover-secondary w-100" href="#">Add to cart</a>
                <a class="btn-link" href="#"><i class="far fa-heart"></i> Add to wishlist</a>
            </div>
        </div>
    </div>
   
    <!-- Include AOS JS, jQuery, and Bootstrap JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Initialize AOS and Handle Filters -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init();

            // Synchronize filter inputs between sidebar and collapse
            function syncFilters(sourceSelector, targetSelector) {
                $(sourceSelector).on('change', function () {
                    $(targetSelector).prop('checked', $(this).prop('checked')).trigger('change');
                });
            }

            syncFilters('#filterForm input[name="categories[]"]', '#sidebar-category');
            syncFilters('#filterForm input[name="instructors[]"]', '#sidebar-instructor');
            syncFilters('#filterForm input[name="price"]', '#sidebar-price');
            syncFilters('#filterForm input[name="languages[]"]', '#sidebar-language');
            syncFilters('#filterForm input[name="levels[]"]', '#sidebar-level');
            syncFilters('#filterForm input[name="sort-by"]', '#filterForm input[name="sort-by"]');

            // Handle filter changes
            $('#filterForm input').on('change', function () {
                const formData = $('#filterForm').serialize();

                $.ajax({
                    url: '{{ route("all_course") }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        $('.tab-pane#grid').html(response.grid);
                        $('.tab-pane#list').html(response.list);
                        $('.archive-filter-bar p span').text(response.totalCourses);
                    },
                    error: function (xhr) {
                        console.error('Filter error:', xhr);
                    }
                });
            });

            // Handle tab switch to refresh AOS animations
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
                AOS.refresh();
            });

            // Reset filters
            $('.reset-filters').on('click', function (e) {
                e.preventDefault();
                $('#filterForm')[0].reset();
                $('#filterForm input[name="sort-by"][value="latest"]').prop('checked', true);
                $('#filterForm input[name="price"][value="all"]').prop('checked', true);
                $('#filterForm').find('input[type="checkbox"]').prop('checked', false);
                $('#filterForm').trigger('change');
            });
        });
    </script>
@endsection