<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProjectRequests\SearchRequest;

class ProductController extends Controller
{
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $demo_popular_products = Product::demoPopularProducts();
        $product = Product::withMiniDescription($id);
        $products = Product::select('title')->paginate();
        return view('product', compact('categories', 'product', 'demo_popular_products'));
    }

    public function search(SearchRequest $request)
    {
        $products = Product::where('title', 'like', '%'.$request->search.'%')->get();
        $categories = Category::all();
        return view(env('THEME').'.search', ['products' => $products, 'categories' => $categories, 'search' => $request->search]);
    }

    public function newProducts()
    {
        $products = Product::newProducts();
        $categories = Category::all();

        return view(env('THEME').'.new_products', ['products' => $products, 'categories' => $categories]);
    }

    public function popularProducts()
    {
        $products = Product::popularProducts();
        $categories = Category::all();
        return view(env('THEME').'.popular_products', ['products' => $products, 'categories' => $categories]);
    }
}