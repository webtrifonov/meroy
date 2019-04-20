<?php

namespace App\Http\Controllers\V0;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
