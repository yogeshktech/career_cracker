<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'position',
        'experience',
        'specialization',
        'profile_image',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}