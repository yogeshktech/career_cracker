<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;

class GoogleMeetLinkNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $googleMeetLink;

    public function __construct(Course $course, string $googleMeetLink)
    {
        $this->course = $course;
        $this->googleMeetLink = $googleMeetLink;
    }

    public function build()
    {
        return $this->subject('Google Meet Link for Your Live Class')
                    ->markdown('emails.google_meet_link')
                    ->with([
                        'courseTitle' => $this->course->title,
                        'googleMeetLink' => $this->googleMeetLink,
                    ]);
    }
}