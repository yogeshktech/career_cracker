@extends('front.student.layout')

@section('title', 'Settings')

@section('content')
<div class="dashboard-content">
    <h4 class="dashboard-title">Settings</h4>

    <!-- Dashboard Settings Start -->
    <div class="dashboard-settings">
        <!-- Dashboard Tabs Start -->
        <div class="dashboard-tabs-menu">
            <ul>
                <li><a class="tab-button active" href="#" data-tab="profile">Profile</a></li>
                <li><a class="tab-button" href="#" data-tab="reset-password">Reset Password</a></li>
            </ul>
        </div>
        <!-- Dashboard Tabs End -->

        <!-- Profile Tab Content -->
        <div id="profile" class="settings-tab-content active">
            <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row gy-6">
                    <div class="col-lg-6">
                        <!-- Contact Information -->
                        <div class="dashboard-content-box">
                            <h4 class="dashboard-content-box__title">Contact Information</h4>
                            <p>Provide your details below to update your account profile</p>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Job Title</label>
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', $user->job_title) }}">
                                        @error('job_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Phone Number</label>
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}">
                                        @error('contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="dashboard-content__input">
                                        <label class="form-label-02">Bio</label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea>
                                        @error('bio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Photo Upload -->
                        <div class="dashboard-content-box">
                            <h4 class="dashboard-content-box__title">Photo</h4>
                            <p>Upload your profile and cover photos.</p>
                            <div id="dashboard-profile-cover-photo-editor" class="dashboard-settings-profile">
                                <!-- Cover Photo -->
                                <input id="dashboard-photo-dialogue-box-cover" class="dashboard-settings-profile__input form-control @error('cover_photo') is-invalid @enderror" type="file" name="cover_photo" accept="image/jpeg,image/png,image/svg+xml,image/webp">
                                @error('cover_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="dashboard-cover-area" class="dashboard-settings-profile__cover" style="background-image:url({{ $user->cover_photo ? asset($user->cover_photo) : asset('front/assets/images/cover-photo.jpg') }})">
                                    {{-- <span class="cover-deleter" data-file="cover_photo">
                                        <i class="fas fa-trash-alt"></i>
                                    </span> --}}
                                    <div class="overlay">
                                        <button class="cover-uploader" type="button">
                                            <i class="fas fa-camera"></i>
                                            <span>Update Cover Photo</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- Profile Photo -->
                                <input id="dashboard-photo-dialogue-box-profile" class="dashboard-settings-profile__input form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" accept="image/jpeg,image/png,image/svg+xml,image/webp">
                                @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="profile-photo" class="dashboard-settings-profile__photo" style="background-image:url({{ $user->avatar ? asset($user->avatar) : asset('front/assets/images/avatar-placeholder.jpg') }})">
                                    <div class="overlay">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div id="photo-meta-area" class="dashboard-settings-profile__photo-meta mt-5">
                                    <img src="{{ asset('front/assets/images/info-icon.svg') }}" alt="icon" />
                                    {{-- <span>Profile Photo Size: <strong>200x200</strong> pixels,</span>
                                    <span>Cover Photo Size: <strong>700x430</strong> pixels,</span>
                                    <span class="loader-area">Saving…</span> --}}
                                    
                                </div>
                                <div id="profile-photo-option" class="dashboard-settings-profile__photo-option">
                                    <span class="profile-photo-uploader"><i class="fas fa-upload"></i> Upload Photo</span>
                                    {{-- <span class="profile-photo-deleter" data-file="avatar"><i class="fas fa-trash-alt"></i> Delete</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="dashboard-settings__btn pt-5">
                    <button type="submit" class="btn btn-primary btn-hover-secondary">Update Profile</button>
                </div>
            </form>
        </div>

        <!-- Reset Password Tab Content -->
        <div id="reset-password" class="settings-tab-content">
            <form action="{{ route('student.settings.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="dashboard-content-box">
                    <h4 class="dashboard-content-box__title">Update Password</h4>
                    <p>Change your account password below.</p>
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Current Password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
                                @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Confirm New Password</label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-settings__btn">
                    <button type="submit" class="btn btn-primary btn-hover-secondary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Dashboard Settings End -->
</div>

<style>
    .dashboard-tabs-menu ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .dashboard-tabs-menu ul li {
        margin-right: 10px;
    }

    .tab-button {
        padding: 8px 15px;
        background-color: #f1f1f1;
        text-decoration: none;
        color: #333;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .tab-button:hover {
        background-color: #ddd;
    }

    .tab-button.active {
        background-color: #007BFF;
        color: white;
    }

    .settings-tab-content {
        display: none;
    }

    .settings-tab-content.active {
        display: block;
    }

    .dashboard-content-box {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .dashboard-content-box__title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .dashboard-content__input {
        margin-bottom: 15px;
    }

    .form-label-02 {
        font-weight: 500;
        margin-bottom: 5px;
        display: block;
    }

    .dashboard-settings-profile__cover {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .dashboard-settings-profile__photo {
        width: 100px;
        height: 100px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
        position: relative;
        margin-bottom: 10px;
    }

    .dashboard-settings-profile__input {
        display: none;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: inherit;
    }

    .dashboard-settings-profile__cover:hover .overlay,
    .dashboard-settings-profile__photo:hover .overlay {
        opacity: 1;
    }

    .cover-uploader,
    .profile-photo-uploader {
        color: #fff;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .cover-deleter,
    .profile-photo-deleter {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.7);
        padding: 5px;
        border-radius: 3px;
    }

    .dashboard-settings-profile__photo-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .dashboard-settings-profile__photo-option {
        display: flex;
        gap: 10px;
    }

    .loader-area {
        display: none;
        color: #007BFF;
    }

    .loader-area.active {
        display: inline-block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.settings-tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                this.classList.add('active');
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Photo upload triggers
        const coverUploader = document.querySelector('.cover-uploader');
        const profileUploader = document.querySelector('.profile-photo-uploader');
        const coverInput = document.getElementById('dashboard-photo-dialogue-box-cover');
        const profileInput = document.getElementById('dashboard-photo-dialogue-box-profile');
        const profilePhoto = document.getElementById('profile-photo');

        if (coverUploader && coverInput) {
            coverUploader.addEventListener('click', () => coverInput.click());
        }

        if (profileUploader && profileInput) {
            profileUploader.addEventListener('click', () => profileInput.click());
        }

        if (profilePhoto && profileInput) {
            profilePhoto.addEventListener('click', () => profileInput.click());
        }

        // Photo preview
        function previewImage(input, targetElement) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    targetElement.style.backgroundImage = `url(${e.target.result})`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        if (coverInput) {
            coverInput.addEventListener('change', function () {
                previewImage(this, document.getElementById('dashboard-cover-area'));
            });
        }

        if (profileInput) {
            profileInput.addEventListener('change', function () {
                previewImage(this, document.getElementById('profile-photo'));
            });
        }

        // Delete photo (client-side preview reset and clear input)
        document.querySelectorAll('.cover-deleter, .profile-photo-deleter').forEach(deleter => {
            deleter.addEventListener('click', function () {
                const fileType = this.getAttribute('data-file');
                const input = document.getElementById(`dashboard-photo-dialogue-box-${fileType === 'avatar' ? 'profile' : 'cover'}`);
                const element = fileType === 'avatar' ? document.getElementById('profile-photo') : document.getElementById('dashboard-cover-area');
                
                // Clear input
                if (input) {
                    input.value = '';
                }
                
                // Reset to default image
                const defaultImage = fileType === 'avatar' ? '{{ asset('front/assets/images/avatar-placeholder.jpg') }}' : '{{ asset('front/assets/images/cover-photo.jpg') }}';
                if (element) {
                    element.style.backgroundImage = `url(${defaultImage})`;
                }

                // Optional: Send AJAX request to delete photo from server
                fetch('{{ route('student.profile.delete-photo') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ file_type: fileType })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Photo deleted successfully');
                    } else {
                        alert('Error deleting photo');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Show loader during form submission
        const form = document.querySelector('form[action="{{ route('student.profile.update') }}"]');
        if (form) {
            form.addEventListener('submit', function () {
                const loader = document.querySelector('.loader-area');
                if (loader) {
                    loader.classList.add('active');
                }
            });
        }
    });
</script>
@endsection