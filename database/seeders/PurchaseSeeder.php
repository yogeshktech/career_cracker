<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Course;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $course1 = Course::create([
            'title' => 'Introduction to PHP',
            'thumbnail' => 'front/assets/images/courses/courses-4.jpg',
            'is_live_class' => false,
            'total_lessons' => 6,
        ]);
        $course2 = Course::create([
            'title' => 'Advanced Laravel',
            'thumbnail' => 'front/assets/images/courses/courses-13.jpg',
            'is_live_class' => false,
            'total_lessons' => 8,
        ]);

        Purchase::create([
            'user_id' => $user->id,
            'course_id' => $course1->id,
            'course_title' => 'Introduction to PHP',
            'amount' => 49.99,
            'status' => 'Completed',
            'date' => '2025-04-15',
        ]);

        Purchase::create([
            'user_id' => $user->id,
            'course_id' => $course2->id,
            'course_title' => 'Advanced Laravel',
            'amount' => 79.99,
            'status' => 'Processing',
            'date' => '2025-04-20',
        ]);
    }
}