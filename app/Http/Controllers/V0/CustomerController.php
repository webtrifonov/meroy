<?php

namespace App\Http\Controllers\V0;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
class CustomerController extends Controller
{
    public function addProductToCart(Request $request, CartProduct $cartProduct)
    {
        CartProduct::create([
            'user_id' => null,
            'session_token' => null, //$request->get('session_token'),
            'order_id' => null,
            'product_id' => $item->id,
            'amount' => $request->get('amount'),
        ]);
        return response()->json([
            'success' => true,
            'amount' => $request->amount
        ]);
    }

    public function deleteProductFromCart(Request $request, CartProduct $cartProduct)
    {
        CartProduct::where(['product_id' => $item->id, 'user_id' => $request->user()->id])->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function calculateTotalPrice($product_ids) {
        $products = Product::select('price')->whereIn('price', $product_ids)->get();

        return 1;
    }
    public function checkout(Request $request)
    {
        //$products = Product::select('price')->whereIn('id', $request->get('product'))->get();
        //dump($products);
        //
        $newOrder = Order::create([
            'user_id' => $request->user()->id,
            'address' => $request->get('address'),
            'total_price' => 100,
        ]);
        $cartProductsData = [];
        for ($i = 0; $i < count($request->get('product')); $i += 1) {
            array_push($cartProductsData, [
                'order_id' => $order->id,
                'product_id' => $request->get('product')[$i],
                'amount' => $request->get('amount')[$i],
            ]);
        }

        //$newOrder->cartProducts()->saveMany([
        //    new App\Models\CartProduct([
        //        'order_id' => $order->id,
        //        'product_id' => 1,
        //        'amount' => 2,
        //    ]),
        //    new App\Models\CartProduct([
        //        'order_id' => $order->id,
        //        'product_id' => 2,
        //        'amount' => 3,
        //    ]),
        //]);
        return response()->json([
            'success' => true
        ]);
    }
}
