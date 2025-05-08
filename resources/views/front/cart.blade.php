@extends('front.layouts.layout')

@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Cart</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-section section-padding-01">
        <div class="container custom-container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($cartItems->isEmpty())
                <div class="alert alert-info text-center">
                    No courses selected in your cart.
                    <a href="{{ url('/courses') }}" class="btn btn-primary mt-3">Browse Courses</a>
                </div>
            @else
                <div class="row gy-6">
                    <!-- Cart Table (8 Columns) -->
                    <div class="col-lg-8">
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product">Product</th>
                                        <th class="price">MRP Price</th>
                                        <th class="price">Sale Price</th>
                                        <th class="price">You Save</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="product">
                                                <div class="cart-product">
                                                    <div class="cart-product__thumbnail">
                                                        
                                                        @if ($item->course->thumbnail)
                                                            <img src="{{ asset('' . $item->course->thumbnail) }}"
                                                                alt="{{ $item->course->title }}" width="70" height="81">
                                                        @else
                                                            <img src="{{ asset('images/placeholder.png') }}"
                                                                alt="No Image" width="70" height="81">
                                                        @endif
                                                    </div>
                                                    <div class="cart-product__content">
                                                        <h3 class="cart-product__name">{{ $item->course->title }}</h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="cart-product__price">
                                                    <span class="mrp-price"><del>₹{{ number_format($item->course->mrp, 2) }}</del></span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="cart-product__price">
                                                    <span class="sale-price">₹{{ number_format($item->course->sale_price, 2) }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="cart-product__price">
                                                    <span class="save-price">₹{{ number_format($item->course->mrp - $item->course->sale_price, 2) }}</span>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="cart-product__remove">
                                                    <form action="{{ route('cart.delete', $item->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="remove"
                                                            onclick="return confirm('Are you sure you want to remove this course?')">Remove</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action d-flex flex-wrap justify-content-between gap-2">
                            <div class="cart-action__left">
                                <a class="btn btn-light btn-hover-primary" href="{{ url('/courses') }}">Continue
                                    shopping</a>
                                <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="cart-action__item btn btn-link"
                                        onclick="return confirm('Are you sure you want to clear the cart?')">
                                        <i class="fas fa-times"></i> Clear shopping cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Billing/Summary (4 Columns) -->
                    <div class="col-lg-4">
                        <div class="cart-collaterals__item">
                            <div class="cart-collaterals__box">
                                <table class="cart-collaterals__table">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>
                                                <span class="subtotal-price">₹{{ number_format($cartItems->sum(fn($item) => $item->course->sale_price), 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-savings">
                                            <th>Total Savings</th>
                                            <td>
                                                <span class="savings-price">₹{{ number_format($cartItems->sum(fn($item) => $item->course->mrp - $item->course->sale_price), 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <span class="total-price">₹{{ number_format($cartItems->sum(fn($item) => $item->course->sale_price), 2) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="cart-collaterals__btn">
                                    <a class="btn btn-primary btn-hover-secondary w-100"
                                        href="{{ route('checkout') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection