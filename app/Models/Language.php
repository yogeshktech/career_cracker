<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}


