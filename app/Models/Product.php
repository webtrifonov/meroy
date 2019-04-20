<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   const ELEMS_IN_DEMO_BLOCK = 4;
   protected $guarded = ['id'];
   protected $casts = [
      'images' => 'array',
      'property_set' => 'array',
      'value_set' => 'array'
   ];
   protected $perPage = 3;
   public function cart_products()
   {
       return $this->hasMany(CartProduct::class);
   }
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
      $product->watched += 1;
      $product->save();
      $product->mini_description = (strlen($product->description) > 100)? substr($product->description, 0, 300).'...' : $product->description;
      return $product;
   }

   public static function newProducts()
   {
      return Product::with('currency')->orderBy('updated_at', 'created_at', 'DESC')->paginate();
   }
   public static function popularProducts()
   {
      return Product::with('currency')->orderBy('watched', 'DESC')->paginate();
   }

   public static function demoNewProducts()
   {
      return Product::with('currency')->take(self::ELEMS_IN_DEMO_BLOCK)->orderBy('updated_at', 'created_at', 'DESC')->get();
   }
   public static function demoPopularProducts()
   {
      return Product::with('currency')->take(self::ELEMS_IN_DEMO_BLOCK)->orderBy('watched', 'DESC')->get();
   }
}
