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
                                <i class="fas  fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info__content">
                                <h3 class="contact-info__title">Address</h3>
                                <p>Delhi , Noida</p>
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
                                <p>Mobile: <strong> 9867-679-600</strong></p>
                                <p>Hotline: <strong>9867-679-600</strong></p>
                                <p>Mail: info@careercracker.in</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                            <div class="contact-info__icon">
                                <i class="fas  fa-clock"></i>
                            </div>
                            <div class="contact-info__content">
                                <h3 class="contact-info__title">Hour of operation</h3>
                                <p>Monday - Friday: 09:00 - 20:00</p>
                                <p>Sunday & Saturday: 10:30 - 22:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                <iframe id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
            </div>
            <div class="contact-form section-padding-01">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section-title__title">Fill the form below so we can get to know you and your needs better.
                    </h2>
                </div>
                <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="contact-form__input">
                                <input class="form-control" type="text" placeholder="Your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form__input">
                                <input class="form-control" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form__input">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-form__input text-center">
                                <button class="btn btn-primary btn-hover-secondary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection