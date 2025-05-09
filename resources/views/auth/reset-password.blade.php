@extends('front.layouts.layout')
@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Reset Password</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Reset Password</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="career-section section-padding-01">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="career-form-wrapper bg-color-10">

                        <!-- Flash messages -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Hidden Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email -->
                            <div class="modal-form">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                       value="{{ old('email', $request->email) }}" readonly required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="modal-form">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="modal-form">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-form">
                                <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Reset Password</button>
                            </div><br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
