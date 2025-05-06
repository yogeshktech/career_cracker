@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Edit Language</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <button type="submit" form="languageForm" class="btn btn-main rounded-pill py-9">Update Language</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Language Details</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="languageForm" action="{{ route('admin.language.update', $language->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row g-20">
                        <div class="col-sm-6">
                            <label for="name" class="h5 mb-8 fw-semibold font-heading">Language Name <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <input type="text" class="form-control py-9 placeholder-13 text-15" id="name" name="name"
                                placeholder="Enter language name" value="{{ old('name', $language->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="status" class="h5 mb-8 fw-semibold font-heading">Status 
                                <span class="text-13 text-gray-400 fw-medium">(Required)</span>
                            </label>
                            <select id="status" name="status" class="form-select py-9 placeholder-13 text-15">
                                <option value="" disabled {{ is_null(old('status', $language->status)) ? 'selected' : '' }}>Select Status</option>
                                <option value="1" {{ old('status', $language->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $language->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection