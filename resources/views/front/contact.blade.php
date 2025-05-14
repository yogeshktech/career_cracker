@extends('front.layouts.layout')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-section">
        <div class="container custom-container">
            <div class="contact-title text-center section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="contact-title__title">How can we help you?</h2>
                <p>We understand that each student's situation and needs are unique to them. Tell us more about what you're
                    looking for, and we will get back to you soon.</p>
            </div>
            <div class="contact-info section-padding-02">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                            <div class="contact-info__icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info__content">
                                <h3 class="contact-info__title">Address</h3>
                                <p>Mumbai India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                            <div class="contact-info__icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info__content">
                                <h3 class="contact-info__title">Contact</h3>
                                <p>Mobile: <strong>9867-679-600</strong></p>
                                {{-- <p>Hotline: <strong>9867-679-600</strong></p> --}}
                                <p>Mail: info@careercracker.in</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                            <div class="contact-info__icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info__content">
                                <h3 class="contact-info__title">Hour of operation</h3>
                                <p>Monday - Friday: 09:00 AM - 05:00 PM</p>
                                <p>Sunday & Saturday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                <iframe id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
            <div class="contact-form section-padding-01">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section-title__title">Fill the form below so we can get to know you and your needs better.</h2>
                </div>
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
                <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <form action="{{ route('enquiry_send') }}" method="POST">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="contact-form__input">
                                    <input class="form-control" name="name" type="text" placeholder="Your name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form__input">
                                    <input name="email" class="form-control" type="email" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form__input">
                                    <input name="phone" class="form-control" type="tel" placeholder="Contact No.">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form__input">
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form__input text-center">
                                    <button type="submit" class="btn btn-primary btn-hover-secondary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-form__input .form-control {
            background-color: #f5f5f5; /* Grey background */
            border: 1px solid #ced4da; /* 1px solid border */
            transition: background-color 0.3s, border-color 0.3s;
        }

        .contact-form__input .form-control:focus {
            background-color: #ffffff; /* White background on focus */
            border: 1px solid #ced4da; /* Maintain 1px solid border */
            outline: none; /* Remove default outline */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Optional: subtle shadow on focus */
        }

        .contact-form__input textarea.form-control {
            resize: vertical; /* Allow vertical resize only */
            min-height: 100px; /* Minimum height for textarea */
        }
    </style>
@endsection