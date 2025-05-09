@extends('front.layouts.layout')
@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Login</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="career-section section-padding-01">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="career-form-wrapper bg-color-10">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="modal-form">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Your email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-form">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                            </div>
                            <div class="modal-form">
                                <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                            </div><br>
                             <div class="text-end">
                                <a class="modal-form__link" href="{{ route('password.request') }}">Forgot your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection