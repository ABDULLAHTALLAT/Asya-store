<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SeoController extends Controller
{
    // XML sitemap listing every page and product in both languages.
    public function sitemap()
    {
        return response()
            ->view('sitemap', ['pages' => ['', '/about', '/shop', '/contact'], 'products' => Product::all(['id', 'updated_at'])])
            ->header('Content-Type', 'application/xml');
    }

    // robots.txt: block the admin area and point to the sitemap.
    public function robots()
    {
        $body = "User-agent: *\nDisallow: /admin\nSitemap: ".url('/sitemap.xml')."\n";

        return response($body)->header('Content-Type', 'text/plain');
    }
}
