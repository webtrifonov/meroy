<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function show(Product $product)
    {
        $categories = Category::all();
        $currencies = Currency::all();
        $product->load(['category', 'currency'])->get();
        return view('admin.product.form', compact('product', 'categories', 'currencies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::pluck('title', 'id');
        //$currencies = Currency::pluck('id', 'title');
        $categories = Category::all();
        $currencies = Currency::all();
        return view('admin.product.create', compact('categories', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        //$this->validate($request, [
        //   'title' => 'required',
        //   'price' => 'required',
        //   'description' => 'required',
        //   'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        //]);
        //image upload
        //$image = $request->image;
        //if($image){
        //    $imageName = $image->getClientOriginalName();
        //    $image->move('assets\images\products', $imageName);
        //    $formInput['image'] = $imageName;
        //}
        Product::create($request->all());
        return redirect()->route('product.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        //Slider::destroy($slide);
        return redirect()->route('product.index');
    }
}
