@forelse ($courses as $course)
    <div class="course-list-item" data-aos="fade-up" data-aos-duration="1000">
        <div class="course-list-header">
            <div class="course-list-header__thumbnail">
                <a href="{{ route('courses.show', $course->id) }}">
                    <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" width="270" height="181" loading="lazy">
                </a>
            </div>
        </div>
        <div class="course-list-info">
            <h3 class="course-list-info__title">
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
            </h3>
            <div class="course-list-info__meta">
                <span><i class="fas fa-play-circle"></i> {{ $course->total_lessons }} Lessons</span>
                <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                <span><i class="fas fa-sliders-h"></i> {{ $course->level }}</span>
            </div>
            <div class="course-list-info__description">
                <p>{{ Str::limit($course->overview, 100) }}</p>
            </div>
            <div class="course-list-info__action">
                <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist">
                    <i class="far fa-heart"></i>
                </button>
            </div>
            <div class="course-list-info__footer">
                <div class="course-list-info__price">
                    <span class="sale-price">${{ number_format($course->sale_price, 2) }}</span>
                </div>
                <div class="course-list-info__rating">
                    <div class="rating-star">
                        <div class="rating-label" style="width: {{ $course->rating ?? 0 }}%;"></div>
                    </div>
                    <div class="rating-average">
                        <span class="rating-average__average">{{ number_format(($course->rating ?? 0) / 20, 1) }}</span>
                        <span class="rating-average__total">/5</span>
                    </div>
                    <p class="course-list-info__rating-count">({{ $course->reviews_count ?? 0 }} ratings)</p>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-info" role="alert">
        No courses found. <a href="{{ route('all_course') }}" class="reset-filters">Reset filters</a>
    </div>
@endforelse