{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('front.layouts.layout')
@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Forgot Password</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Forgot Password</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="career-section section-padding-01">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="career-form-wrapper bg-color-10">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
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
                        <form action="{{ route('password.email') }}" method="POST">
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
                                <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Email Password Reset Link</button>
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection