@extends('front.layouts.layout')

@section('content')
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

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
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th"></i></button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-bars"></i></button></li>
                            </ul>
                            <button class="btn btn-light btn-hover-primary collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
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
                                                            <input type="checkbox" id="collapse-category{{ $category->id }}"
                                                                   name="categories[]" value="{{ $category->id }}">
                                                            <label for="collapse-category{{ $category->id }}">{{ $category->name }}
                                                                <span>({{ $category->courses()->where('status', 'published')->count() }})</span></label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Placeholder for other filters -->
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="widget-filter">
                                        <h4 class="widget-filter__title">Other Filters</h4>
                                        <div class="widget-filter__wrapper widgetScroll">
                                            <!-- Add other filter inputs here, e.g., instructors[], price, etc. -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="reset-filters btn btn-light">Reset Filters</button>
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
                                                <input type="checkbox" id="sidebar-category{{ $category->id }}"
                                                       name="categories[]" value="{{ $category->id }}">
                                                <label for="sidebar-category{{ $category->id }}">{{ $category->name }}
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

<!-- Include Font Awesome, AOS JS, jQuery, and Bootstrap JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script> --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Initialize AOS and Handle Filters -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS
    AOS.init();

    // Synchronize filter inputs between sidebar and collapse
    function syncFilters(sourceSelector, targetSelector) {
        $(document).on('change', sourceSelector, function () {
            const value = $(this).val();
            const isChecked = $(this).prop('checked');
            $(`${targetSelector}[value="${value}"]`).not(this).prop('checked', isChecked);
        });
    }

    // Sync categories between collapse and sidebar
    syncFilters('#filterForm input[name="categories[]"]', '.sidebar-widget-wrap input[name="categories[]"]');
    syncFilters('.sidebar-widget-wrap input[name="categories[]"]', '#filterForm input[name="categories[]"]');

    // Handle filter changes with event delegation
    $(document).on('change', '#filterForm input, .sidebar-widget-wrap input[name="categories[]"]', function () {
        const formData = $('#filterForm').serialize();
        console.log('Form Data:', formData); // Debug form data

        $.ajax({
            url: '{{ route("all_course") }}',
            type: 'GET',
            data: formData,
            success: function (response) {
                console.log('Response:', response); // Debug response
                $('.tab-pane#grid').html(response.grid);
                $('.tab-pane#list').html(response.list);
                $('.archive-filter-bar p span').text(response.totalCourses);
                AOS.refresh(); // Refresh AOS animations after content update
            },
            error: function (xhr) {
                console.error('Filter error:', xhr.responseText); // Log detailed error
            }
        });
    });

    // Handle tab switch to refresh AOS animations
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
        AOS.refresh();
    });

    // Ensure collapse toggle works
    $('[data-bs-toggle="collapse"]').each(function () {
        const $button = $(this);
        const target = $button.data('bs-target');
        const $target = $(target);

        // Initialize collapse state
        if ($target.hasClass('show')) {
            $button.removeClass('collapsed').attr('aria-expanded', 'true');
        } else {
            $button.addClass('collapsed').attr('aria-expanded', 'false');
        }

        // Handle click to toggle collapse
        $button.on('click', function (e) {
            e.preventDefault();
            console.log('Collapse toggle:', { target, isExpanded: $button.attr('aria-expanded') }); // Debug
            $target.collapse($button.attr('aria-expanded') === 'true' ? 'hide' : 'show');
        });
    });

    // Update button state on collapse show/hide
    $('#collapseFilter').on('show.bs.collapse hide.bs.collapse', function (e) {
        const $button = $('[data-bs-target="#collapseFilter"]');
        console.log('Collapse event:', e.type); // Debug
        if (e.type === 'show') {
            $button.removeClass('collapsed').attr('aria-expanded', 'true');
        } else {
            $button.addClass('collapsed').attr('aria-expanded', 'false');
        }
    });

    // Reset filters
    $('.reset-filters').on('click', function (e) {
        e.preventDefault();
        $('#filterForm')[0].reset();
        $('.sidebar-widget-wrap input[name="categories[]"]').prop('checked', false);
        $('#filterForm input[name="sort-by"][value="latest"]').prop('checked', true);
        $('#filterForm input[name="price"][value="all"]').prop('checked', true);
        $('#filterForm').trigger('change');
    });
});
</script>
@endsection