<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderCourse extends Pivot
{
    protected $table = 'order_course';

    protected $fillable = ['order_id', 'course_id', 'price'];
}