<div class="row g-6">
    @forelse ($courses as $course)
        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000">
            <div class="course-item  py-3">
                <div class="course-header">
                    <div class="course-header__thumbnail">
                        <a href="{{ route('courses.show', $course->id) }}">
                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" width="330" height="221" loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="course-info">
                    {{-- <span class="course-info__badge-text badge-all">{{ $course->level ?? 'All Levels' }}</span> --}}
                    <h3 class="course-info__title">
                        <a href="{{ route('courses.show', $course->id) }}"><b>{{ $course->title }}</b></a>
                    </h3>
                   
                    <div class="course-info__price">
                        <span class="sale-price">
                            ₹{{ number_format($course->sale_price, 2, '.', '') }}
                            @if($course->sale_price == floor($course->sale_price))
                                <small class="separator"></small>
                            @endif
                        </span>
                    </div>
                    <div class="course-info__rating">
                        <div class="rating-star">
                            <div class="rating-label" style="width: {{ $course->rating ?? 0 }}%;"></div>
                        </div>
                        <span>({{ $course->reviews_count ?? 0 }})</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                No courses found. <a href="{{ route('all_course') }}" class="reset-filters">Reset filters</a>
            </div>
        </div>
    @endforelse
</div>