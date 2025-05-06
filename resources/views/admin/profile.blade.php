@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Profile</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <button type="submit" form="profileForm" class="btn btn-main rounded-pill py-9">Update Profile</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Edit Profile</h5>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row gy-20">
                        <div class="col-sm-6">
                            <label for="profile_image" class="h5 mb-8 fw-semibold font-heading">Profile Image <span
                                    class="text-13 text-gray-400 fw-medium">(Optional, max 5MB)</span></label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/png,image/jpeg" onchange="previewImage(event)">
                            @error('profile_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mt-3">
                                <img id="imagePreview" src="{{ asset('' .$admin->profile_image ?? 'uploads/admins/default.png') }}" alt="Profile Image" style="max-height: 200px; display: block;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="name" class="h5 mb-8 fw-semibold font-heading">Name <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <input type="text" name="name" id="name" class="form-control py-9 placeholder-13 text-15"
                                value="{{ old('name', $admin->name) }}" placeholder="Enter your name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="h5 mb-8 fw-semibold font-heading">Email <span
                                    class="text-13 text-gray-400 fw-medium">(Required)</span></label>
                            <input type="email" name="email" id="email" class="form-control py-9 placeholder-13 text-15"
                                value="{{ old('email', $admin->email) }}" placeholder="Enter your email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="current_password" class="h5 mb-8 fw-semibold font-heading">Current Password <span
                                    class="text-13 text-gray-400 fw-medium"></span></label>
                            <input type="password" name="current_password" id="current_password" class="form-control py-9 placeholder-13 text-15"
                                placeholder="Enter current password">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="h5 mb-8 fw-semibold font-heading">New Password <span
                                    class="text-13 text-gray-400 fw-medium">(Optional, min 8 characters)</span></label>
                            <input type="password" name="password" id="password" class="form-control py-9 placeholder-13 text-15"
                                placeholder="Enter new password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="password_confirmation" class="h5 mb-8 fw-semibold font-heading">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control py-9 placeholder-13 text-15"
                                placeholder="Confirm new password">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
    </script>
@endsection