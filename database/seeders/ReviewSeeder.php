<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'course_id' => 1,
            'user_id' => 1,
            'rating' => 4.5,
            'comment' => 'Great course!',
        ]);

        Review::create([
            'course_id' => 1,
            'user_id' => 2,
            'rating' => 4.0,
            'comment' => 'Very informative.',
        ]);

        Review::create([
            'course_id' => 2,
            'user_id' => 1,
            'rating' => 5.0,
            'comment' => 'Amazing content!',
        ]);
    }
}
