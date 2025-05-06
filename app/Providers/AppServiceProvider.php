<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('front.layouts.*', function ($view) {
            $categories = Category::where('status', 'public')
                ->with(['subcategories' => function ($query) {
                    $query->where('status', 'active')
                        ->with(['courses' => function ($query) {
                            $query->where('status', 'published')
                                ->select('id', 'subcategory_id', 'title', 'thumbnail', 'sale_price', 'mrp');
                        }]);
                }])
                ->get();
            $view->with('categories', $categories);
        });
    }
}
