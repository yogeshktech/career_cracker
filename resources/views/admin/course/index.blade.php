@extends('admin.layout.layout')
@section('content')
<div class="dashboard-body">
    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                <li><span class="text-main-600 fw-normal text-15">All Courses</span></li>
            </ul>
        </div>
        <div class="buttons flex-align gap-8">
            <a href="{{ route('admin.courses.create') }}"
               class="btn btn-main rounded-pill py-9">Add Course</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-onGoing" role="tabpanel"
                    aria-labelledby="pills-onGoing-tab" tabindex="0">
                    <div class="row g-20">
                        @foreach ($courses as $course)
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="card border border-gray-100">
                                    <div class="card-body p-8">
                                        <a href="{{ route('admin.courses.edit', $course->id) }}"
                                            class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" class="w-100">
                                        </a>
                                        <div class="p-8">
                                            <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">
                                                {{ $course->subcategory->name ?? 'Uncategorized' }}
                                            </span>
                                            <h5 class="mb-0">
                                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="hover-text-main-600">
                                                    {{ $course->title }}
                                                </a>
                                            </h5>
                                            <p><del>{{ $course->mrp }}</del></p> <p>{{ $course->sale_price }}</p>
                                            <div class="flex-align gap-8 mt-12">
                                                <span class="text-main-600 flex-shrink-0 text-13 fw-medium">{{ $course->progress }}%</span>
                                                <div class="progress w-100 bg-main-100 rounded-pill h-8" role="progressbar"
                                                    aria-label="Progress" aria-valuenow="{{ $course->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: {{ $course->progress }}%"></div>
                                                </div>
                                            </div>
                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                <img src="assets/images/thumbs/user-img1.png"
                                                    class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                <div>
                                                    <span class="text-gray-600 text-13">Created by
                                                        <a href="#" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">
                                                            {{ $course->creator->name ?? 'Admin' }}
                                                        </a>
                                                    </span>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-align gap-5 mt-24">
                                                <a href="{{ route('admin.courses.edit', $course->id) }}"
                                                    class="btn btn-outline-main rounded-pill py-9 w-100">Edit</a>
                                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger rounded-pill py-9 w-100"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection