<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categories = Category::all();
        $category = $categories->where('id', $id)->first();
        $products = Product::where('category_id', $id)->paginate();
        if ($category == null) {
            return abort(404);
        } 
        return view(env('THEME').'.category', compact('categories', 'category', 'products'));
    }

    public function showAll()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
}
