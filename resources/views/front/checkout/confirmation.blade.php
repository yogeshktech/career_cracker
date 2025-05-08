@extends('front.layouts.layout')

@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order Confirmation</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Order Confirmation</h2>
                </div>
            </div>
        </div>
    </div>

    <main class="container my-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-4">Thank you for your order!</h5>
                <p>Order ID: #{{ $order->id }}</p>
                <p>Payment Method: {{ ucfirst($order->payment_method) }}</p>
                <p>Status: {{ ucfirst($order->status) }}</p>
                <p>Total: ₹{{ number_format($order->total, 2) }}</p>

                <h6 class="mt-4">Courses Purchased:</h6>
                <ul>
                    @foreach ($order->courses as $course)
                        <li>{{ $course->title }} (₹{{ number_format($course->pivot->price, 2) }})</li>
                    @endforeach
                </ul>

                <a href="{{ route('student.dashboard') }}" class="btn btn-primary mt-4">Browse More Courses</a>
            </div>
        </div>
    </main>
@endsection