<?php

namespace App\Http\Controllers\V0;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function deleteProductFromCart(CartProduct $cartProduct)
    {
        //CartProduct::where(['product_id' => $item->id, 'user_id' => $request->user()->id])->delete();
        $cartProduct->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function calculateTotalPrice($products, $address) {
        //$products->sum(function ($product) {
        //    return $product->price * $product->amount;
        //});
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $product->amount;
        }
        if ($address) {
            $totalPrice += env('ADDRESS_PRICE');
        }
        return $totalPrice;
    }
    public function cartProductsData($products)
    {
        $cartProductsData = [];
        foreach ($products as $k => $product) {
            array_push($cartProductsData, [
                'product_id' => $product->id,
                'amount' => $product->amount
            ]);
        }
        return $cartProductsData;
    }
    public function checkout(Request $request)
    {
        $p = $request->get('products');
        $a = $request->get('amounts');
        $products = Product::select('id', 'price')->whereIn('id', $p)->get();
        $products->each(function ($item) use ($p, $a){
            return $item->amount = $a[array_search($item->id,$p)];
        });
        $order = $request->user()->orders()->create([
            'user_id' => $request->user()->id,
            'address' => $request->get('address'),
            'total_price' => $this->calculateTotalPrice($products, $request->get('address'))
        ]);
        $order->cartProducts()->createMany(
            $this->cartProductsData($products)
        );
        return response()->json([
            'success' => true,
            'data' => [
                'order' => $order
            ],
        ]);
    }
}
