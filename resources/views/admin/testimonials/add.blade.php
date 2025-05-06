@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><a href="{{ route('admin.testimonials.index') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Testimonials</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Add Testimonial</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                <button type="submit" form="testimonialForm" class="btn btn-main rounded-pill py-9">Publish Testimonial</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Add New Testimonial</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="testimonialForm" action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-20">
                        <div class="col-sm-12">
                            <label for="name" class="h5 mb-8 fw-semibold font-heading">Name <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    maxlength="100" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                                <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                    <span id="current">{{ strlen(old('name', '')) }}</span>
                                    <span id="maximum">/ 100</span>
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="image" class="h5 mb-8 fw-semibold font-heading">Image <span
                                    class="text-13 text-gray-400 fw-medium">(Required, max 5MB)</span></label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)" required>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Image Preview" style="max-height: 200px; display: none;">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="designation" class="h5 mb-8 fw-semibold font-heading">Designation <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <input type="text" class="form-control py-11" id="designation" name="designation" placeholder="Enter designation" value="{{ old('designation') }}" required>
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label for="content" class="h5 mb-8 fw-semibold font-heading">Content <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <textarea id="content" name="content" class="form-control" placeholder="Write the testimonial content">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            height: 400,
            menubar: false,
        });

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        const nameInput = document.getElementById('name');
        const currentCount = document.getElementById('current');
        nameInput.addEventListener('input', function() {
            currentCount.textContent = this.value.length;
        });
    </script>
@endsection