@extends('front.layouts.layout')
@section('content')
    <div class="page-banner">
        <div class="page-banner__wrapper about-banner"
            style="background-image: url({{ asset('front/assets/images/about-us-hero-bg.jpg)') }}">
            <div class="container">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb breadcrumb-white">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">About us</li>
                    </ul>
                </div>
                <div class="about-banner-caption">
                    <h2 class="about-banner-caption__main-title">Welcome to Career Cracker </h2>
                </div>
            </div>
        </div>
    </div>
    <section class="container pading  my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="section-title__title-03">About Us</h2>
                <p>
                    Your Gateway to a Thriving IT Career At Career Cracker, we
                    believe that your success is our success. We offer intensive,
                    45-day online courses designed to fast-track your journey
                    into high-demand IT careers. Our unique "Learn Now, Pay
                    Later" model ensures you pay only after securing a job.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('front/assets/images/gallery/about-us-gallery-03.jpg')}}" class="img-fluid"
                    alt="Right Side Image">
            </div>
        </div>
    </section>
    <div class="academics-section bg-color-05 section-padding-01 scene">
        <div class="container custom-container">
            <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title__title-03">What Make Us <mark>Spcecial?</mark> </h2>
            </div>
            <div class="row g-6">
                <div class="col-lg-4 col-md-4">
                    <div class="academics-item text-center" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#" class="academics-item__link">
                            <div class="academics-item__image">
                                <img src="{{ asset('front/assets/images/academics/event-thumbnail-01.jpg')}}"
                                    alt="University" width="370" height="269">
                                <h3 class="academics-item__title">Our Values</h3>
                            </div>
                            <div class="academics-item__description">
                                <p>At CareerCracker, we value integrity, excellence, and
                                    a commitment to lifelong learning. We believe that
                                    education should be accessible to all and strive to
                                    create an inclusive and welcoming environment for
                                    our students.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="academics-item text-center" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#" class="academics-item__link">
                            <div class="academics-item__image">
                                <img src="{{ asset('front/assets/images/academics/event-thumbnail-02.jpg')}}"
                                    alt="University" width="370" height="269">
                                <h3 class="academics-item__title">Our Approach</h3>
                            </div>
                            <div class="academics-item__description">
                                <p>We take a holistic approach to education, recognizing
                                    that academic success is just one aspect of a fulfilling
                                    life. We work closely with our students to identify their
                                    goals and aspirations, and to develop the skills and
                                    mindset needed to achieve them.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="academics-item text-center" data-aos="fade-up" data-aos-duration="1000">
                        <a href="#" class="academics-item__link">
                            <div class="academics-item__image">
                                <img src="{{ asset('front/assets/images/academics/event-thumbnail-03.jpg')}}"
                                    alt="University" width="370" height="269">
                                <h3 class="academics-item__title">Our Services</h3>
                            </div>
                            <div class="academics-item__description">
                                <p>We offer a wide range of services to support students
                                    at all levels, including academic tutoring, Interview
                                    preparation, Placement Help and more. Our services
                                    are tailored to the unique needs of each student to
                                    ensure the best possible outcomes.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="academics-section__shape-01" data-depth="-0.4"></div>
        <div class="academics-section__shape-02" data-depth="-0.4"></div>
        <div class="academics-section__shape-03" data-depth="0.4"></div>
    </div>
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="container custom-container">
            <div class="row gy-10">
                <div class="col-lg-8 offset-2">
                    <div class="tutor-course-main-segment">
                        <div class="tutor-course-segment">
                            <div class="tutor-course-segment__header justify-content-center" id="detail">
                                <h4 class="section-title__title-03">Why Choose Career Cracker?</h4>
                            </div>
                            <div class="course-curriculum accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"> <i class="tutor-icon"></i>No Upfront Costs,
                                        Guaranteed Success</button>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Our commitment to your future is reflected in our unique "Pay
                                                    After Placement" model. You invest in your education only when
                                                    it translates into real-world success, ensuring that both our
                                                    goals are aligned with your career aspirations.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"> <i class="tutor-icon"></i> Unwavering
                                        Placement Guarantee</button>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    At Career Cracker, we don't just promise; we deliver. Our 100%
                                                    placement guarantee is a testament to our confidence in our
                                                    programs and our dedication to your professional growth.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree"> <i class="tutor-icon"></i> Distinguished
                                        Faculty</button>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Learn from seasoned professionals who bring years of industry
                                                    expertise and a deep passion for education. Our instructors are
                                                    not just teachers; they are mentors who guide you through the
                                                    intricacies of the IT landscape.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour"> <i class="tutor-icon"></i> Immersive and
                                        Interactive Learning</button>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Engage in live, online classes that transcend traditional
                                                    teaching methods. Our courses are designed to be interactive,
                                                    ensuring that you gain practical, hands-on experience that
                                                    prepares you for real-world challenges.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive"> <i class="tutor-icon"></i> Holistic
                                        Curriculum Design</button>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Each course at Career Cracker is thoughtfully curated to cover
                                                    the latest industry trends, tools, and technologies. Our
                                                    comprehensive approach ensures that you acquire not just
                                                    knowledge, but the ability to apply it effectively.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix"> <i class="tutor-icon"></i> Tailored Career
                                        Services</button>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Beyond technical training, we equip you with the tools to
                                                    succeed in the job market. From personalized resume-building
                                                    sessions to simulated interviews and networking opportunities,
                                                    we provide comprehensive support to enhance your employability.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven"> <i class="tutor-icon"></i> Flexible and
                                        Accessible Education</button>
                                    <div id="collapseSeven" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    We understand the demands of modern life, which is why our
                                                    courses are accessible anytime, anywhere. Learn at your own pace
                                                    with a structure that adapts to your schedule.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight"> <i class="tutor-icon"></i> Global Alumni
                                        Network</button>
                                    <div id="collapseEight" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">

                                                    Join a thriving community of Career Cracker graduates who are
                                                    making their mark in the IT industry. Our alumni network offers
                                                    ongoing support, networking opportunities, and access to
                                                    exclusive job openings.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine"> <i class="tutor-icon"></i> Commitment to
                                        Lifelong Learning</button>
                                    <div id="collapseNine" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Your relationship with Career Cracker doesn't end with course
                                                    completion. We offer continuous learning opportunities,
                                                    including access to advanced modules and industry updates, to
                                                    ensure you remain at the forefront of the ever-evolving IT
                                                    sector.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTen"> <i class="tutor-icon"></i>
                                        Industry-Recognized Certification</button>
                                    <div id="collapseTen" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    Upon successful completion, you receive a certification that is
                                                    highly regarded by employers, giving you a competitive edge in
                                                    the job market.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEleven"> <i class="tutor-icon"></i> Student-Centric
                                        Approach</button>
                                    <div id="collapseEleven" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionCourse">
                                        <div class="course-curriculum__lessons">
                                            <div class="course-curriculum__lesson">
                                                <span class="course-curriculum__title">
                                                    At Career Cracker, you're not just another student; you're a
                                                    valued member of our community. We tailor our support to meet
                                                    your individual needs, ensuring your success every step of the
                                                    way.
                                                </span>
                                                <span class="course-curriculum__icon">
                                                    <i class="fas fa-lock-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection