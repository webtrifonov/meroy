<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;

class IndexController extends SiteController
{
    public function show(Request $request)
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $products = Product::with('currency');
        $demo_popular_products = Product::demoPopularProducts();
        $demo_new_products = Product::demoNewProducts();
        return view(env('THEME').'/index', compact('sliders', 'categories', 'products', 'demo_popular_products', 'demo_new_products'));
    }
}
