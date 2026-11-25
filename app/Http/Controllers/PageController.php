<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    // Home: slider, about teaser, mission/vision, gallery, best sellers.
    public function home()
    {
        $best = Product::where('is_best_seller', true)->latest()->take(8)->get();

        return view('home', compact('best'));
    }

    // About page.
    public function about()
    {
        return view('about');
    }

    // Shop page: all products, paginated.
    public function shop()
    {
        return view('shop', ['products' => Product::latest()->paginate(12)]);
    }

    // One page per product, plus a few related ones.
    public function show(Product $product)
    {
        $related = Product::where('id', '!=', $product->id)->latest()->take(4)->get();

        return view('product', compact('product', 'related'));
    }

    // Contact page (WhatsApp only, no forms to abuse).
    public function contact()
    {
        return view('contact');
    }
}
