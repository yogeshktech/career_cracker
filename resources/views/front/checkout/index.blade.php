@extends('front.layouts.layout')

@section('content')
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Checkout</h2>
                </div>
            </div>
        </div>
    </div>

    <main class="container my-4">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Name: {{ $user->name }}</h5>
                                <div class="text-muted small">
                                    <span>Mobile No.: {{ $user->contact_no ?? 'N/A' }}</span><br>
                                    <span>Email Id: {{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="user-avatar">
                                <div class="avatar-placeholder">
                                    <i class="fa-solid fa-user text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Selection -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-4">Payment Method</h5>
                        <div class="payment-options">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="payment-option active" data-method="razorpay">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">
                                                <img src="https://razorpay.com/assets/razorpay-logo.svg" alt="Razorpay" width="40">
                                            </div>
                                            <div>Razorpay</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Razorpay Payment Section -->
                        <div class="payment-section" id="razorpay-section">
                            <div class="my-4">
                                <p class="text-center">Proceed with Razorpay payment.</p>
                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-primary py-2" id="rzp-button">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if ($courseId)
                            <!-- Single Course for Buy Now -->
                            @php
                                $course = $cartItems->first()->course;
                            @endphp
                            <div class="d-flex mb-4">
                                <div class="course-image me-3">
                                    @if ($course->thumbnail)
                                        <img src="{{ asset($course->thumbnail) }}"
                                             alt="{{ $course->title }}" class="img-fluid rounded" width="80">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}"
                                             alt="No Image" class="img-fluid rounded" width="80">
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ $course->title }}</h6>
                                    <div class="text-success small">Valid for 12 months</div>
                                    <a href="{{ url('/courses/' . $course->id) }}" class="text-success small">View details</a>
                                </div>
                            </div>
                        @else
                            <!-- Cart Items -->
                            @foreach ($cartItems as $item)
                                <div class="d-flex mb-4">
                                    <div class="course-image me-3">
                                        @if ($item->course->thumbnail)
                                            <img src="{{ asset($item->course->thumbnail) }}"
                                                 alt="{{ $item->course->title }}" class="img-fluid rounded" width="80">
                                        @else
                                            <img src="{{ asset('images/placeholder.png') }}"
                                                 alt="No Image" class="img-fluid rounded" width="80">
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-1">{{ $item->course->title }}</h6>
                                        <div class="text-success small">Valid for 12 months</div>
                                        <a href="{{ url('/courses/' . $item->course->id) }}" class="text-success small">View details</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- Price Breakdown -->
                        <div class="price-breakdown">
                            <div class="d-flex justify-content-between mb-2">
                                <div>Course MRP</div>
                                <div><del>₹{{ number_format($cartItems->sum(fn($item) => $item->course->mrp), 2) }}</del></div>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-success">
                                <div>Offer discount</div>
                                <div>- ₹{{ number_format($cartItems->sum(fn($item) => $item->course->mrp - $item->course->sale_price), 2) }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <div>Total <span class="fw-normal text-muted small">(incl. of all taxes)</span></div>
                                <div>₹{{ number_format($cartItems->sum(fn($item) => $item->course->sale_price), 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Razorpay Checkout Script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('rzp-button').onclick = function(e) {
            var options = {
                "key": "{{ config('services.razorpay.key') }}",
                "amount": {{ $cartItems->sum(fn($item) => $item->course->sale_price) * 100 }},
                "currency": "INR",
                "name": "Career Cracker",
                "description": "Course Purchase",
                "image": "{{ asset('front/assets/images/careercracker.png') }}",
                "order_id": "{{ $razorpayOrder['id'] }}",
                "handler": function(response) {
                    // Send payment details to server
                    fetch("{{ route('checkout.process') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            @if ($courseId)
                                course_id: "{{ $courseId }}"
                            @endif
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.error);
                        }
                    })
                    .catch(error => {
                        alert('Payment processing failed. Please try again.');
                    });
                },
                "prefill": {
                    "name": "{{ $user->name }}",
                    "email": "{{ $user->email }}",
                    "contact": "{{ $user->contact_no ?? '' }}"
                },
                "theme": {
                    "color": "#28a745"
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
            e.preventDefault();
        }
    </script>
@endsection