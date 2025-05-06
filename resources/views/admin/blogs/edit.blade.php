@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><a href="{{ route('admin.blogs.index') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Blogs</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Edit Blog</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                <button type="submit" form="blogForm" class="btn btn-main rounded-pill py-9">Update Blog</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Edit Blog</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="blogForm" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row gy-20">
                        <div class="col-sm-12">
                            <label for="title" class="h5 mb-8 fw-semibold font-heading">Blog Title <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    maxlength="100" id="title" name="title" placeholder="Enter blog title" value="{{ old('title', $blog->title) }}" required>
                                <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                    <span id="current">{{ strlen(old('title', $blog->title)) }}</span>
                                    <span id="maximum">/ 100</span>
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="blog_image" class="h5 mb-8 fw-semibold font-heading">Blog Image <span
                                    class="text-13 text-gray-400 fw-medium">(Optional, max 5MB)</span></label>
                            <input type="file" name="blog_image" id="blog_image" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)">
                            @error('blog_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mt-3">
                                <img id="imagePreview" src="{{ asset($blog->blog_image) }}" alt="Image Preview" style="max-height: 200px; display: block;">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="description" class="h5 mb-8 fw-semibold font-heading">Description <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <textarea id="description" name="description" class="form-control" placeholder="Write the blog content">{{ old('description', $blog->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
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

        const titleInput = document.getElementById('title');
        const currentCount = document.getElementById('current');
        titleInput.addEventListener('input', function() {
            currentCount.textContent = this.value.length;
        });
    </script>
@endsection