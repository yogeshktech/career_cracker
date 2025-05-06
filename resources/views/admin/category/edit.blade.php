@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                           class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Edit Category</span></li>
                </ul>
            </div>
        </div>

        <ul class="step-list mb-24">
            <li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6 active">
                <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span>
                Edit Category
                <span class="line position-relative"></span>
            </li>
        </ul>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Category Details</h5>
                <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Category Details">
                    <i class="ph-fill ph-question"></i>
                </button>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row gy-20">
                        <div class="col-xxl-3 col-md-4 col-sm-5">
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span
                                        class="text-13 text-gray-400 fw-medium">(Optional)</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Category Image</label>
                                <input type="file" name="thumbnail" onchange="previewImage(event)">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-3">
                                    <img id="thumbnailPreview" 
                                         src="{{ $category->thumbnail ? asset('' . $category->thumbnail) : asset('images/placeholder.png') }}" 
                                         alt="Preview" 
                                         style="max-height: 200px; {{ $category->thumbnail ? '' : 'display: none;' }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-9 col-md-8 col-sm-7">
                            <div class="row g-20">
                                <div class="col-sm-12">
                                    <label for="name" class="h5 mb-8 fw-semibold font-heading">Category Name <span class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <div class="position-relative">
                                        <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                               maxlength="100" id="name" name="name" placeholder="Enter category name"
                                               value="{{ old('name', $category->name) }}">
                                        <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                            <span id="current">{{ strlen(old('name', $category->name)) }}</span>
                                            <span>/ 100</span>
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="description" class="h5 mb-8 fw-semibold font-heading">Category Description</label>
                                    <textarea id="description" name="description" class="form-control py-11 placeholder-13" rows="4"
                                              placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label class="h5 mb-8 fw-semibold font-heading">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="publicOption"
                                               value="public" {{ old('status', $category->status) == 'public' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="publicOption">Public</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="privateOption"
                                               value="private" {{ old('status', $category->status) == 'private' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="privateOption">Private</label>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex-align justify-content-end gap-8">
                            <a href="{{ route('admin.categories.index') }}"
                               class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                            <button type="submit" class="btn btn-main rounded-pill py-9">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const nameInput = document.getElementById('name');
    const currentCount = document.getElementById('current');
    nameInput.addEventListener('input', () => {
        currentCount.textContent = nameInput.value.length;
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('thumbnailPreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
