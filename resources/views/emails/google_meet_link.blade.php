@component('mail::message')
# Live Class Scheduled for {{ $courseTitle }}

Dear Student,

A live class for **{{ $courseTitle }}** has been scheduled. You can join using the Google Meet link below:

@component('mail::button', ['url' => $googleMeetLink])
Join Live Class
@endcomponent

If you have any questions, please contact support.

Best regards,  
Your Learning Platform Team
@endcomponent