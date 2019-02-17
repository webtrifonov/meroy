<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;

class ProductController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $currencies = Currency::pluck('id', 'title');
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
        $formInput = $request->all();
        
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
        Product::create($formInput);
        return redirect()->route('product.create');
    }

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
        return view('product', compact('categories', 'product', 'demo_popular_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
