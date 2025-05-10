@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Edit Course</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                <button type="submit" form="courseForm" name="status" value="draft"
                    class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Save as Draft</button>
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
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="courseForm" action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row gy-20">
                        <div class="col-xxl-3 col-md-4 col-sm-5">
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span
                                        class="text-13 text-gray-400 fw-medium">(Optional, max 5MB)</span></label>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-3">
                                    <img id="thumbnailPreview" src="{{ asset($course->thumbnail) }}" alt="Thumbnail Preview" style="max-height: 200px; display: block;">
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
                                            maxlength="100" id="title" name="title" placeholder="Name of the Course" value="{{ old('title', $course->title) }}" required>
                                        <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                            <span id="current">{{ strlen(old('title', $course->title)) }}</span>
                                            <span id="maximum">/ 100</span>
                                        </div>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="category_id" class="h5 mb-8 fw-semibold font-heading">Course Category <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <select id="category_id" name="category_id" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="subcategory_id" class="h5 mb-8 fw-semibold font-heading">
                                        Course Subcategory <span class="text-13 text-gray-400 fw-medium">(Required)</span>
                                    </label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled {{ empty(old('subcategory_id', $course->subcategory_id)) ? 'selected' : '' }}>
                                            Select Subcategory
                                        </option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                {{ old('subcategory_id', $course->subcategory_id) == $subcategory->id ? 'selected' : '' }}
                                                data-category-id="{{ $subcategory->category_id }}">
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="mrp" class="h5 mb-8 fw-semibold font-heading">MRP Price <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <input type="number" name="mrp" value="{{ old('mrp', $course->mrp) }}"
                                        class="form-control py-9 placeholder-13 text-15" placeholder="Enter MRP Price" step="0.01" min="0" required>
                                    @error('mrp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="sale_price" class="h5 mb-8 fw-semibold font-heading">Sale Price <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <input type="number" name="sale_price" value="{{ old('sale_price', $course->sale_price) }}"
                                        class="form-control py-9 placeholder-13 text-15" placeholder="Enter Sale Price" step="0.01" min="0" required>
                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="level" class="h5 mb-8 fw-semibold font-heading">Course Level <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <select id="level" name="level" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled>Select Course Level</option>
                                        <option value="Beginner" {{ old('level', $course->level) == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="Intermediate" {{ old('level', $course->level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Advanced" {{ old('level', $course->level) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                    </select>
                                    @error('level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="duration" class="h5 mb-8 fw-semibold font-heading">Duration <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <select id="duration" name="duration" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled>Select Duration</option>
                                        <option value="5 Hours" {{ old('duration', $course->duration) == '5 Hours' ? 'selected' : '' }}>5 Hours</option>
                                        <option value="10 Hours" {{ old('duration', $course->duration) == '10 Hours' ? 'selected' : '' }}>10 Hours</option>
                                        <option value="15 Hours" {{ old('duration', $course->duration) == '15 Hours' ? 'selected' : '' }}>15 Hours</option>
                                        <option value="20 Hours" {{ old('duration', $course->duration) == '20 Hours' ? 'selected' : '' }}>20 Hours</option>
                                    </select>
                                    @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="total_lectures" class="h5 mb-8 fw-semibold font-heading">Total Lectures</label>
                                    <input type="number" class="form-control py-9 placeholder-13 text-15" id="total_lectures" name="total_lectures"
                                        placeholder="Enter number of lectures" min="0" value="{{ old('total_lectures', $course->total_lectures) }}">
                                    @error('total_lectures')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="language_id" class="h5 mb-8 fw-semibold font-heading">Language <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <select id="language_id" name="language_id" class="form-select py-9 placeholder-13 text-15" required>
                                        <option value="" disabled {{ old('language_id', $course->language_id) === null ? 'selected' : '' }}>Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ old('language_id', $course->language_id) == $language->id ? 'selected' : '' }}>
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="overview" class="h5 mb-8 fw-semibold font-heading">Overview <span
                                            class="text-13 text-gray-400 fw-medium"></span></label>
                                    <textarea id="overview" name="overview" rows="4" class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Write a brief overview of the course" required>{{ old('overview', $course->overview) }}</textarea>
                                    @error('overview')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="highlights" class="h5 mb-8 fw-semibold font-heading">Course Highlights</label>
                                    <textarea id="highlights" name="highlights" rows="4" class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Highlight key features of the course">{{ old('highlights', $course->highlights) }}</textarea>
                                    @error('highlights')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="details" class="h5 mb-8 fw-semibold font-heading">Course Details</label>
                                    <textarea id="details" name="details" rows="4" class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Provide in-depth course details">{{ old('details', $course->details) }}</textarea>
                                    @error('details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="why_choose_us" class="h5 mb-8 fw-semibold font-heading">Why Choose Us</label>
                                    <textarea id="why_choose_us" name="why_choose_us" rows="4" class="form-control py-9 placeholder-13 text-15"
                                        placeholder="Explain why learners should choose this course">{{ old('why_choose_us', $course->why_choose_us) }}</textarea>
                                    @error('why_choose_us')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="progress" class="h5 mb-8 fw-semibold font-heading">Progress (%) <span
                                            class="text-13 text-gray-400 fw-medium">(Required, 0-100)</span></label>
                                    <input type="number" class="form-control py-9 placeholder-13 text-15" id="progress" name="progress"
                                        placeholder="Enter progress percentage" min="0" max="100" value="{{ old('progress', $course->progress) }}" required>
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

        // Image preview functionality
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnailPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Title character counter
        const titleInput = document.getElementById('title');
        const currentCount = document.getElementById('current');
        titleInput.addEventListener('input', function() {
            currentCount.textContent = this.value.length;
        });

        // Dynamic subcategory filtering
        function filterSubcategories() {
            const categoryId = document.getElementById('category_id').value;
            const subcategorySelect = document.getElementById('subcategory_id');
            const currentSubcategoryId = '{{ old('subcategory_id', $course->subcategory_id) }}';
            const options = subcategorySelect.querySelectorAll('option[data-category-id]');
            let validSelection = false;

            options.forEach(option => {
                const optionCategoryId = option.getAttribute('data-category-id');
                if (optionCategoryId === categoryId || option.value === '') {
                    option.style.display = 'block';
                    if (option.value === currentSubcategoryId && optionCategoryId === categoryId) {
                        validSelection = true;
                    }
                } else {
                    option.style.display = 'none';
                }
            });

            // Only reset subcategory if the current selection is invalid
            if (!validSelection && currentSubcategoryId !== '') {
                subcategorySelect.value = '';
            }
        }

        document.getElementById('category_id').addEventListener('change', filterSubcategories);

        // Trigger filtering on page load
        filterSubcategories();
    </script>
@endsection