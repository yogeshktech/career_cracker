<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('front.layouts.header', function ($view) {
            $categories = Category::where('status', 'public')
                ->with(['subcategories' => function ($query) {
                    $query->where('status', 'public')
                          ->with(['courses' => function ($query) {
                              $query->where('status', 'published')
                                    ->select('id', 'subcategory_id', 'title', 'thumbnail', 'sale_price', 'mrp')
                                    ->take(3); // Limit to 3 courses per subcategory
                          }]);
                }])
                ->get();

            $view->with('categories', $categories);
        });
    }
}