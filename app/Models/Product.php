<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = ['title', 'description', 'images', 'price', 'totalcount', 'property_set', 'value_set', 'currency_id', 'category_id', 'alias'];
   protected $casts = [
      'images' => 'array',
      'property_set' => 'array',
      'value_set' => 'array'
   ];
   public function category()
   {
      return $this->belongsTo('App\Models\Category');
   }
   public function currency()
   {
      return $this->belongsTo('App\Models\Currency');
   }
   public static function withMiniDescription($id)
   {
      $product = Product::with('category')->find($id);
      $product->mini_description = (strlen($product->description)>100)? substr($product->description, 0, 300).'...' : $product->description;
      return $product;
   }
   public static function demoNewProducts()
   {
      return Product::with('currency')->take(4)->orderBy('updated_at', 'created_at', 'DESC')->get();
   }
   public static function demoPopularProducts()
   {
      //change
      return Product::with('currency')->take(4)->orderBy('updated_at', 'created_at', 'DESC')->get();
   }
}
