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
                                <h5 class="mb-1">Name:- {{ $user->name }}</h5>
                                <div class="text-muted small">
                                    <span>Mobile No.:- {{ $user->contact_no ?? 'N/A' }}</span> •<br>
                                    <span>Email Id:- {{ $user->email }}</span> •
                                    
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
                        <h5 class="mb-4">Choose a payment method</h5>
                        <!-- Payment Options -->
                        <div class="payment-options">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="payment-option active" data-method="cod">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">
                                                <i class="fa-solid fa-money-bill"></i>
                                            </div>
                                            <div>Cash on Delivery</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hidden Payment Options (for future use) -->
                                <div class="col-md-4 mb-3 d-none">
                                    <div class="payment-option" data-method="upi">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/UPI-Logo-vector.svg/1200px-UPI-Logo-vector.svg.png"
                                                    alt="UPI" width="40">
                                            </div>
                                            <div>UPI</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 d-none">
                                    <div class="payment-option" data-method="card">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3 text-success">
                                                <i class="fa-solid fa-credit-card"></i>
                                            </div>
                                            <div>Debit / Credit Card</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 d-none">
                                    <div class="payment-option" data-method="netbanking">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3 text-danger">
                                                <i class="fa-solid fa-building-columns"></i>
                                            </div>
                                            <div>Netbanking</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COD Payment Section -->
                        <div class="payment-section" id="cod-section">
                            <div class="my-4">
                                <p class="text-center">You will pay the total amount upon delivery.</p>
                                <form action="{{ route('checkout.process') }}" method="POST">
                                    @csrf
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary py-2">Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Hidden Payment Sections (for future use) -->
                        <div class="payment-section d-none" id="upi-section">
                            <!-- UPI payment form (as in original) -->
                        </div>
                        <div class="payment-section d-none" id="card-section">
                            <!-- Card payment form (as in original) -->
                        </div>
                        <div class="payment-section d-none" id="netbanking-section">
                            <!-- Netbanking payment form (as in original) -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @foreach ($cartItems as $item)
                            <div class="d-flex mb-4">
                                <div class="course-image me-3">
                                    @if ($item->course->thumbnail)
                                        <img src="{{ asset('' . $item->course->thumbnail) }}"
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

                        <!-- Referral Code -->
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-tag text-success"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" placeholder="Have a referral code?">
                            </div>
                        </div>

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
@endsection