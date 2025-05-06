<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'mrp',
        'sale_price',
        'thumbnail',
        'level',
        'duration',
        'total_lessons',
        'total_lectures',
        'language_id',
        'overview',
        'highlights',
        'details',
        'why_choose_us',
        'created_by',
        'progress',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class, 'course_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRatingAttribute()
    {
        return $this->reviews()->avg('rating') * 20; // Convert 0-5 scale to 0-100%
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }
}