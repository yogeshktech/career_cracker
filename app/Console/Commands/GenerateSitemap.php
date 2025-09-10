<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate a sitemap automatically from frontend routes';

    public function handle()
    {
        $sitemap = Sitemap::create();

        foreach (Route::getRoutes() as $route) {
            // Only include GET routes with a URI
            if (in_array('GET', $route->methods) && $route->uri() !== '/') {

                $uri = '/' . ltrim($route->uri(), '/');

                // Exclude admin and student routes
                if (str_starts_with($uri, '/admin') || str_starts_with($uri, '/student')) {
                    continue;
                }

                // Add to sitemap
                $sitemap->add(Url::create($uri));
            }

            // Always include homepage
            if ($route->uri() === '/') {
                $sitemap->add(Url::create('/'));
            }
        }

        // Save the sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generated successfully at public/sitemap.xml');
    }
}
