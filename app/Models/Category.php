<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'thumbnail'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    
}