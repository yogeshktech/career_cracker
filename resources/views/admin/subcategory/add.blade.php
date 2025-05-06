@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                           class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Add Subcategory</span></li>
                </ul>
            </div>
        </div>

        <ul class="step-list mb-24">
            <li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6 active">
                <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span>
                Add Subcategory
                <span class="line position-relative"></span>
            </li>
        </ul>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Subcategory Details</h5>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('admin.subcategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-20">
                        <div class="col-xxl-3 col-md-4 col-sm-5">
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Category Select<span
                                        class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            </div>
                            <div class="mb-3">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                        
                            <div class="mb-20">
                                <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span
                                        class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Subcategory Image</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                                {{-- Image preview --}}
                                <div class="mt-3">
                                    <img id="thumbnailPreview" src="#" alt="Preview" style="max-height: 200px; display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-md-8 col-sm-7">
                            <div class="row g-20">
                                <div class="col-sm-12">
                                    <label for="title" class="h5 mb-8 fw-semibold font-heading">Subcategory Title <span
                                            class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                                    <input type="text" class="form-control py-11 placeholder-13" id="title" name="title"
                                           placeholder="Enter subcategory title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-sm-6">
                                    <label class="h5 mb-8 fw-semibold font-heading">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="publicOption"
                                               value="public" {{ old('status', 'public') == 'public' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="publicOption">Public</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="privateOption"
                                               value="private" {{ old('status') == 'private' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="privateOption">Private</label>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="description" class="h5 mb-8 fw-semibold font-heading">Description</label>
                                    <textarea id="description" name="description" class="form-control py-11 placeholder-13" rows="4"
                                              placeholder="Enter subcategory description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex-align justify-content-end gap-8">
                            <a href="{{ route('admin.subcategories.index') }}"
                               class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                            <button type="submit" class="btn btn-main rounded-pill py-9">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection