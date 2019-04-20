<?php

namespace App\Http\Controllers\Customer;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view(env('THEME').'.customer.personal');
    }
    public function showCart()
    {
        $cartProducts = CartProduct::select(['id', 'amount', 'product_id'])->with(['product' => function($query) {
            $query->select(['id', 'title', 'price', 'currency_id'])->with('currency:id,title');
        }])->get();
        return view(env('THEME').'.cart', compact('cartProducts'));
    }
}
