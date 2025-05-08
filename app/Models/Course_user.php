<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_user extends Model
{
    protected $table = 'course_user'; 
    protected $fillable = [
        'course_id',
        'user_id',
        'completed_lessons',
        'progress',
        'google_meet_link',
        'google_drive_link',
    ];

    public $timestamps = true; 
}
