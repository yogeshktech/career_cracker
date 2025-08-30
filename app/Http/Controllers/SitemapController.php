<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function index()
    {
        // This will crawl your entire site and create a sitemap
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        return response()->file(public_path('sitemap.xml'));
    }
}
