@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Purchased Courses</span></li>
                </ul>
            </div>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Success!</strong> {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Warning!</strong> {{ session('warning') }}
            </div>
        @endif
        
        <div class="row gy-4">
            @forelse ($courses as $course)
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">Students Enrolled: {{ $course->users_count }}</p>
                            <p class="card-text">
                                Google Meet Link:
                                @if ($course->users->first() && $course->users->first()->pivot->google_meet_link)
                                    <a href="{{ $course->users->first()->pivot->google_meet_link }}" target="_blank">Start Class</a>
                                @else
                                    Not Set
                                @endif
                            </p>
                            <p class="card-text">
                                Google Drive Link:
                                @if ($course->users->first() && $course->users->first()->pivot->google_drive_link)
                                    <a href="{{ $course->users->first()->pivot->google_drive_link }}" target="_blank">View Link</a>
                                @else
                                    Not Set
                                @endif
                            </p><hr>
                            <form action="{{ route('admin.orders.updateLinks', $course->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="google_meet_link_{{ $course->id }}" class="form-label">Google Meet Link</label>
                                    <input type="url" name="google_meet_link" id="google_meet_link_{{ $course->id }}"
                                           class="form-control" placeholder="e.g., https://meet.google.com/abc-defg-hij"
                                           value="{{ $course->users->first()->pivot->google_meet_link ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="google_drive_link_{{ $course->id }}" class="form-label">Google Drive Link</label>
                                    <input type="url" name="google_drive_link" id="google_drive_link_{{ $course->id }}"
                                           class="form-control" placeholder="e.g., https://drive.google.com/file/d/1234567890"
                                           value="{{ $course->users->first()->pivot->google_drive_link ?? '' }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Links</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No courses have been purchased yet.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection