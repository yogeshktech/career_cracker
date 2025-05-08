<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'payment_method', 'status'];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_order')
                    ->withPivot('price')
                    ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}