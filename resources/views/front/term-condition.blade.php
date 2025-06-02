@extends('front.layouts.layout')
@section('content')
   <div class="page-banner bg-color-05">
      <div class="page-banner__wrapper">
        <div class="container">
          <div class="page-breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
               <li class="breadcrumb-item active">Term & Condition</li>
            </ul>
          </div>
          <div class="page-banner__caption text-center">
            <h2 class="page-banner__main-title">Term & Condition</h2>
          </div>
        </div>
      </div>
   </div>
   <section class="container  my-5">
      <div class="card  border-0">
        <div class="card-body p-5">
          <h2 class="section-title__title-03 py-3"><span class="orange">Term &</span> Condition</h2>
          <p>Welcome to Career Cracker Academy (“we”, “us”, “our”). By accessing or using our website, enrolling in our
            courses, or using any of our services, you (“you”, “student”, “user”) agree to be bound by the following
            Terms and Conditions. Please read them carefully before proceeding.

          </p>




          <hr class="my-4">

          <h3 class="section-title__title-03 mb-3">1. Acceptance of Terms</h3>
          <p>By using our services, you agree to these Terms and Conditions and our Privacy Policy. If you do not agree
            to these terms, you may not access our services or enroll in our courses.

          </p>




          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">2. Educational Integrity</h2>

          <ul class="list-unstyled ms-3">
            <li> Career Cracker Academy does not provide or support the use of fake certificates or fraudulent
               experience letters under any circumstances.</li>
            <li> If any student chooses to obtain such documents independently, they do so at their own risk,
               and Career Cracker Academy is not liable in any legal, ethical, or professional capacity.</li>
          </ul>
          <hr class="my-4">
          <h2 class="section-title__title-03 py-3">3. Placement Guarantee</h2>

          <ul class="list-unstyled ms-3">
            <li>
               We offer a <strong>100% placement guarantee</strong> only in scenarios where the student:
               <ul class="ms-4">
                 <li> Actively participates in learning, assignments, mock interviews, and placement activities.</li>
                 <li> Attends classes, interacts during sessions, and completes tasks assigned by the trainer or
                   placement team.</li>
               </ul>
            </li>
            <li>
               Career Cracker reserves the right to <strong>revoke placement assistance</strong> if the student shows
               consistent disinterest, fails to attend sessions, or does not respond to placement opportunities.
            </li>
          </ul>

          <style>
            .list-unstyled {
               list-style: none;
               padding-left: 0;
            }

            .list-unstyled li::before {
               content: "•";
               color: black;
               font-weight: bold;
               display: inline-block;
               width: 1em;
               margin-left: 0;
            }

            .ms-3 {
               margin-left: 1.5rem;
            }

            .ms-4 {
               margin-left: 2rem;
               /* Adjusts the nested <ul> to shift slightly right */
            }
          </style>

          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">4. Fee Structure and Payment</h2>
          <ul class="list-unstyled ms-3">
            <li> The fee structure will be clearly explained during the demo session.</li>
            <li> Students are expected to adhere strictly to the agreed-upon payment timelines.</li>
            <li> Failure to make payments after placement, or refusal to pay as per the agreed policy, may result in:
            </li>
            <ul class="ms-4">
               <li>Suspension of course access and placement services.</li>
               <li>Legal action to recover dues under applicable Indian laws.</li>
            </ul>
          </ul>

          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">5. No Job Guarantee Without Compliance</h2>
          <ul class="list-unstyled ms-3">
            <li> Placement is subject to:</li>

            <ul class="ms-4">
               <li> Completion of all training modules.</li>
               <li> Active participation in mock interviews, assessments, and skill enhancement activities</li>
               <li> Following the code of conduct throughout the course.</li>
            </ul>
            <li>Any attempt to misuse the placement system or falsify data will result in immediate
               disqualification from placement assistance.</li>
          </ul>


          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">6. Intellectual Property</h2>

          <p>All course content, training material, videos, recordings, and website content are the intellectual property
            of Career Cracker Academy. Unauthorized copying, distribution, resale, or use for commercial purposes is
            strictly prohibited.</p>
          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">7. Prohibited Uses</h2>
          <p>You agree not to use our website or services:</p>
          <ul class="list-unstyled ms-3">
            <li> For any unlawful or fraudulent activity.</li>
            <li> To harass, abuse, or harm other students or faculty.</li>
            <li> To submit false information or impersonate another individual.</li>
            <li> To upload viruses, malicious scripts, or interfere with the functionality of our platform.</li>
            <li> To attempt to access restricted areas or tamper with course materials.</li>
            <li> For plagiarism or cheating in assignments, exams, or projects.</li>
          </ul>
          <p>Violation of any of these terms can lead to immediate suspension or termination of your access to the
            platform without refund.</p>

          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">8. Modifications to Service and Pricing</h2>
          <p>Career Cracker reserves the right to:</p>
          <ul class="list-unstyled ms-3">

            <li> Modify course content, faculty, fee structure, or placement process at any time.</li>
            <li> Update these Terms and Conditions periodically. Continued use of the service implies acceptance of
               changes.</li>
          </ul>


          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">9. Termination of Service</h2>
          <p>We reserve the right to:</p>
          <ul class="list-unstyled ms-3">
            <li> Deny or terminate service to any student who violates our terms, behaves inappropriately, or misuses
               the platform.</li>
            <li> Take legal action in case of breach of agreement, especially concerning payment and misrepresentation.
            </li>
          </ul>
          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">10. Dispute Resolution</h2>
          <ul class="list-unstyled ms-3">
            <li> All disputes arising out of or in connection with these Terms shall be subject to the jurisdiction of
               the courts in Mumbai, Maharashtra, India.</li>
            <li> We prefer to resolve matters amicably first through written communication. You can contact us
               at info@careercracker.com for any disputes or concerns.</li>
          </ul>

          <hr class="my-4">

          <h2 class="section-title__title-03 py-3">11. Contact Information</h2>
          <p>If you have any questions about these Terms and Conditions, please contact us at:</p>
          <ul class="list-unstyled ms-3">
            <li> info@careercracker.com</li>
            <li> www.careercracker.com</li>
          </ul>



        </div>
   </section>
@endsection