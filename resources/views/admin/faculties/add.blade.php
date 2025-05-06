@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Create Faculty Account</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <button type="submit" form="facultyForm" name="status" value="draft"
                    class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Save as Draft</button>
                <button type="submit" form="facultyForm" name="status" value="published"
                    class="btn btn-main rounded-pill py-9">Publish Faculty</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Faculty Details</h5>
                <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Faculty Details">
                    <i class="ph-fill ph-question"></i>
                </button>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="facultyForm" action="{{ route('admin.faculties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-20">
                        <div class="col-xxl-3 col-md-4 col-sm-5">
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Profile Image <span
                                        class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)">
                                @error('profile_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-3">
                                    <img id="imagePreview" src="#" alt="Preview" style="max-height: 200px; display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-md-8 col-sm-7">
                            <div class="row g-20">
                                <div class="col-sm-12">
                                    <label for="name" class="h5 mb-8 fw-semibold font-heading">Faculty Name <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <div class="position-relative">
                                        <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                            maxlength="100" id="name" name="name" placeholder="Enter Faculty Name" value="{{ old('name') }}">
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
                                    <label for="email" class="h5 mb-8 fw-semibold font-heading">Email <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <input type="email" class="form-control py-9 placeholder-13 text-15" id="email" name="email"
                                        placeholder="Enter Faculty Email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="course_id" class="h5 mb-8 fw-semibold font-heading">Select Course</label>
                                    <select id="course_id" name="course_id" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                    
                                    </select>
                                    @error('course_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="position" class="h5 mb-8 fw-semibold font-heading">Position</label>
                                    <select id="position" name="position" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Position</option>
                                        <option value="Lecturer" {{ old('position') == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                                        <option value="Assistant Professor" {{ old('position') == 'Assistant Professor' ? 'selected' : '' }}>Assistant Professor</option>
                                        <option value="Associate Professor" {{ old('position') == 'Associate Professor' ? 'selected' : '' }}>Associate Professor</option>
                                        <option value="Professor" {{ old('position') == 'Professor' ? 'selected' : '' }}>Professor</option>
                                        <option value="Head of Department" {{ old('position') == 'Head of Department' ? 'selected' : '' }}>Head of Department</option>
                                    </select>
                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="experience" class="h5 mb-8 fw-semibold font-heading">Experience</label>
                                    <select id="experience" name="experience" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Experience</option>
                                        <option value="1-3 Years" {{ old('experience') == '1-3 Years' ? 'selected' : '' }}>1-3 Years</option>
                                        <option value="3-5 Years" {{ old('experience') == '3-5 Years' ? 'selected' : '' }}>3-5 Years</option>
                                        <option value="5-10 Years" {{ old('experience') == '5-10 Years' ? 'selected' : '' }}>5-10 Years</option>
                                        <option value="10+ Years" {{ old('experience') == '10+ Years' ? 'selected' : '' }}>10+ Years</option>
                                    </select>
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="specialization" class="h5 mb-8 fw-semibold font-heading">Specialization</label>
                                    <select id="specialization" name="specialization" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" disabled selected>Select Specialization</option>
                                        <option value="Data Structures" {{ old('specialization') == 'Data Structures' ? 'selected' : '' }}>Data Structures</option>
                                        <option value="Machine Learning" {{ old('specialization') == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
                                        <option value="Economics" {{ old('specialization') == 'Economics' ? 'selected' : '' }}>Economics</option>
                                        <option value="Psychology" {{ old('specialization') == 'Psychology' ? 'selected' : '' }}>Psychology</option>
                                        <option value="Marketing" {{ old('specialization') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                        <option value="Finance" {{ old('specialization') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    </select>
                                    @error('specialization')
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