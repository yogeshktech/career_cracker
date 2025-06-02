@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Create Course</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <button type="submit" form="courseForm" name="status" value="draft"
                    class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Save as
                    Draft</button>
                <button type="submit" form="courseForm" name="status" value="published"
                    class="btn btn-main rounded-pill py-9">Publish Course</button>
            </div>
        </div>

        <ul class="step-list mb-24">
            <li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6 active">
                <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span>
                Course Details
                <span class="line position-relative"></span>
            </li>
        </ul>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Course Details</h5>
                <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Course Details">
                    <i class="ph-fill ph-question"></i>
                </button>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="courseForm" action="{{ route('admin.courses.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-20">
                        <div class="col-xxl-3 col-md-4 col-sm-5">
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span
                                        class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control"
                                    accept="image/png,image/jpeg" onchange="previewImage(event)">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-3">
                                    <img id="thumbnailPreview" src="#" alt="Preview"
                                        style="max-height: 200px; display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-md-8 col-sm-7">
                            <div class="row g-20">
                                <div class="col-sm-12">
                                    <label for="title" class="h5 mb-8 fw-semibold font-heading">Course Name <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <div class="position-relative">
                                        <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                            maxlength="100" id="title" name="title" placeholder="Name of the Course"
                                            value="{{ old('title') }}">
                                        <div
                                            class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                            <span id="current">0</span>
                                            <span id="maximum">/ 100</span>
                                        </div>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="category_id" class="h5 mb-8 fw-semibold font-heading">Course
                                        Category</label>
                                    <select id="category_id" name="category_id"
                                        class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    {{-- <label for="subcategory_id" class="h5 mb-8 fw-semibold font-heading">Course
                                        Subcategory</label>
                                    <select id="subcategory_id" name="subcategory_id"
                                        class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                                <div class="col-sm-6">
                                    <label for="mrp" class="h5 mb-8 fw-semibold font-heading">MRP Price</label>
                                    <input type="number" name="mrp" value="{{ old('mrp') }}"
                                        class="form-control py-9 placeholder-13 text-15" placeholder="Enter MRP Price"
                                        step="0.01" required>
                                    @error('mrp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="sale_price" class="h5 mb-8 fw-semibold font-heading">Sale Price</label>
                                    <input type="number" name="sale_price" value="{{ old('sale_price') }}"
                                        class="form-control py-9 placeholder-13 text-15" placeholder="Enter Sale Price"
                                        step="0.01" required>
                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="level" class="h5 mb-8 fw-semibold font-heading">Course Level</label>
                                    <select id="level" name="level" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select course level</option>
                                        <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner
                                        </option>
                                        <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>
                                            Intermediate</option>
                                        <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced
                                        </option>
                                    </select>
                                    @error('level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="duration" class="h5 mb-8 fw-semibold font-heading">Duration</label>
                                        <input type="text" name="duration" class="form-control py-9 placeholder-13 text-15" value="{{old('duration')}}" placeholder="Duration" required>
                                    @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="total_lectures" class="h5 mb-8 fw-semibold font-heading">Total
                                        Lectures</label>
                                    <input type="number" class="form-control py-9 placeholder-13 text-15"
                                        id="total_lectures" name="total_lectures" placeholder="Enter number of lectures"
                                        value="{{ old('total_lectures') }}">
                                    @error('total_lectures')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="language_id" class="h5 mb-8 fw-semibold font-heading">Language <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <select id="language_id" name="language_id" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled selected>Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ old('language_id') == $language->id ? 'selected' : '' }}>
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-12">
                                    <label for="overview" class="h5 mb-8 fw-semibold font-heading">Overview</label>
                                    <textarea id="overview" name="overview" rows="4"
                                        class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Write a brief overview of the course">{{ old('overview') }}</textarea>
                                    @error('overview')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="highlights" class="h5 mb-8 fw-semibold font-heading">Course
                                        Highlights</label>
                                    <textarea id="highlights" name="highlights" rows="4"
                                        class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Highlight key features of the course">{{ old('highlights') }}</textarea>
                                    @error('highlights')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="details" class="h5 mb-8 fw-semibold font-heading">Course Details</label>
                                    <textarea id="details" name="details" rows="4"
                                        class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Provide in-depth course details">{{ old('details') }}</textarea>
                                    @error('details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="why_choose_us" class="h5 mb-8 fw-semibold font-heading">Why Choose
                                        Us</label>
                                    <textarea id="why_choose_us" name="why_choose_us" rows="4"
                                        class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Explain why learners should choose this course">{{ old('why_choose_us') }}</textarea>
                                    @error('why_choose_us')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="is_saleable" class="h5 mb-8 fw-semibold font-heading">Available for Sale</label>
                                    <select id="is_saleable" name="is_saleable" class="form-select py-9 placeholder-13 text-15">
                                        <option value="1" {{ old('is_saleable', 1) == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_saleable') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('is_saleable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="progress" class="h5 mb-8 fw-semibold font-heading">Progress (%)</label>
                                    <input type="number" class="form-control py-9 placeholder-13 text-15" id="progress"
                                        name="progress" placeholder="Enter progress percentage" min="0" max="100"
                                        value="{{ old('progress', 0) }}">
                                    @error('progress')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include CKEditor 4.16.0 -->
    
    <script>
        // Initialize CKEditor for textareas
        CKEDITOR.replace('overview', {
            height: 200
        });
        CKEDITOR.replace('highlights', {
            height: 200
        });
        CKEDITOR.replace('details', {
            height: 200
        });
        CKEDITOR.replace('why_choose_us', {
            height: 200
        });

        // Existing scripts for image preview and title character counter
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnailPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        const titleInput = document.getElementById('title');
        const currentCount = document.getElementById('current');
        titleInput.addEventListener('input', function () {
            currentCount.textContent = this.value.length;
        });
    </script>
@endsection