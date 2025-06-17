@extends('front.layouts.layout')

@section('content')
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

    <!-- Add Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

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
                                <li><button class="active" data-view="grid"><i class="fas fa-th"></i></button></li>
                                <li><button data-view="list"><i class="fas fa-bars"></i></button></li>
                            </ul>
                            <button class="btn btn-light btn-hover-primary" id="filterToggleBtn">
                                <i class="fas fa-filter"></i> Filters
                            </button>
                        </div>
                    </div>
                </div>

                <div class="filter-panel" id="filterPanel">
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
                                                                   name="categories[]" value="{{ $category->id }}"
                                                                   class="filter-checkbox">
                                                            <label for="category{{ $category->id }}">{{ $category->name }}
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
                            <button type="button" class="reset-filters btn btn-light mt-3">Reset Filters</button>
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
                                                       name="categories[]" value="{{ $category->id }}"
                                                       class="filter-checkbox">
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
{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

<!-- Add these scripts at the bottom of the file -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter panel toggle
    const filterPanel = document.getElementById('filterPanel');
    const filterToggleBtn = document.getElementById('filterToggleBtn');
    let isFilterOpen = false;

    filterToggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        isFilterOpen = !isFilterOpen;
        filterPanel.style.display = isFilterOpen ? 'block' : 'none';
    });

    // Close filter when clicking outside
    document.addEventListener('click', function(e) {
        if (isFilterOpen && !filterPanel.contains(e.target) && e.target !== filterToggleBtn) {
            isFilterOpen = false;
            filterPanel.style.display = 'none';
        }
    });

    // Prevent closing when clicking inside filter panel
    filterPanel.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // View toggle (grid/list)
    const viewButtons = document.querySelectorAll('[data-view]');
    const gridView = document.getElementById('grid');
    const listView = document.getElementById('list');

    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            // Update button states
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update view
            if (view === 'grid') {
                gridView.classList.add('show', 'active');
                listView.classList.remove('show', 'active');
            } else {
                listView.classList.add('show', 'active');
                gridView.classList.remove('show', 'active');
            }
        });
    });

    // Sync checkboxes between main filter and sidebar
    function syncCheckboxes(sourceCheckbox) {
        const value = sourceCheckbox.value;
        const isChecked = sourceCheckbox.checked;
        
        document.querySelectorAll(`.filter-checkbox[value="${value}"]`).forEach(checkbox => {
            if (checkbox !== sourceCheckbox) {
                checkbox.checked = isChecked;
            }
        });
    }

    // Handle filter changes
    document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Sync checkboxes
            syncCheckboxes(this);
            
            // Get form data
            const formData = new FormData(document.getElementById('filterForm'));
            
            // Make AJAX request
            fetch('{{ route("all_course") }}?' + new URLSearchParams(formData), {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.grid) {
                    document.getElementById('grid').innerHTML = data.grid;
                }
                if (data.list) {
                    document.getElementById('list').innerHTML = data.list;
                }
                if (data.totalCourses !== undefined) {
                    document.querySelector('.archive-filter-bar p span').textContent = data.totalCourses;
                }
            })
            .catch(error => console.error('Filter error:', error));
        });
    });

    // Reset filters
    document.querySelector('.reset-filters').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Reset all checkboxes
        document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Trigger filter update
        const event = new Event('change');
        document.querySelector('.filter-checkbox').dispatchEvent(event);
    });
});
</script>

<style>
.filter-panel {
    display: none;
    background: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-top: 10px;
    margin-bottom: 20px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.widget-filter__wrapper {
    max-height: 200px;
    overflow-y: auto;
    padding-right: 10px;
}

.widget-filter__list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.widget-filter__item {
    margin-bottom: 8px;
}

.widget-filter__item label {
    display: flex;
    align-items: center;
    cursor: pointer;
    margin: 0;
}

.widget-filter__item input[type="checkbox"] {
    margin-right: 8px;
}

@media (max-width: 767px) {
    .filter-bar-wrapper {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn {
        width: 100%;
        margin: 5px 0;
    }
}
</style>
@endsection