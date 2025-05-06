@extends('front.student.layout')

@section('title', 'My Profile')

@section('content')
    <div class="dashboard-content">
        <!-- Dashboard Profile Start -->
        <div class="dashboard-profile">
            <div class="dashboard-profile__item">
                <div class="dashboard-profile__heading">Registration Date</div>
                <div class="dashboard-profile__content">
                    <p>{{ $student->created_at->format('D d M Y, h:i:s a') }}</p>
                </div>
            </div>
            <div class="dashboard-profile__item">
                <div class="dashboard-profile__heading">Username</div>
                <div class="dashboard-profile__content">
                    <p>{{ $student->name }}</p>
                </div>
            </div>
           
            <div class="dashboard-profile__item">
                <div class="dashboard-profile__heading">Email</div>
                <div class="dashboard-profile__content">
                    <p>{{ $student->email }}</p>
                </div>
            </div>
            <div class="dashboard-profile__item">
                <div class="dashboard-profile__heading">Phone Number</div>
                <div class="dashboard-profile__content">
                    <p>{{ $student->contact_no ?? 'N/A' }}</p>
                </div>
            </div>
           
        </div>
        <!-- Dashboard Profile End -->

        <!-- Profile Edit Form Start -->
        <div class="dashboard-profile mt-4">
            <h4 class="dashboard-title">Edit Profile</h4>
            <form action="{{ route('student.profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="contact_no" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
        <!-- Profile Edit Form End -->
    </div>
@endsection