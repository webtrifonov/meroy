<?php

namespace App\Http\Controllers\Customer;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = $request->user()->load(['orders' => function ($orderQuery) {
            $orderQuery->select(['id', 'user_id', 'status', 'address', 'total_price'])
               ->with(['cartProducts' => function ($cartProductQuery) {
                   $cartProductQuery->select(['id', 'product_id', 'order_id', 'amount'])
                       ->with(['product' => function ($productQuery) {
                           $productQuery->select(['id', 'title', 'price']);
                       }])->get();
            }])->get();
        }]);
        return view(env('THEME').'.customer.account.orders', compact('customer'));
    }
    public function showCart()
    {
        $cartProducts = CartProduct::select(['id', 'amount', 'product_id'])->with(['product' => function($query) {
            $query->select(['id', 'title', 'price', 'currency_id'])->with('currency:id,title');
        }])->get();
        return view(env('THEME').'.cart', compact('cartProducts'));
    }
    public function personal(Request $request) {
        $customer = $request->user()->load('orders');
        return view(env('THEME').'.customer.account.personal', compact('customer'));
    }
    public function calculateTotalPrice($h_products) {
        $totalPrice = 0;
        foreach ($h_products as $h_product) {
            $h_product = json_decode($h_product);
            $totalPrice += $h_product->price * $h_product->amount;
        }
        return $totalPrice;
    }
    public function addOrder(Request $request) {
        $h_products = $request->get('h_products');
        $order = $request->user()->orders()->create([
            'user_id' => $request->user()->id,
            'address' => $request->get('address'),
            'total_price' => $this->calculateTotalPrice($h_products)
        ]);
        $cartProductsData = [];
        foreach ($h_products as $h_product) {
            $h_product = json_decode($h_product);
            array_push($cartProductsData, [
                'product_id' => $h_product->id,
                'amount' => $h_product->amount
            ]);
        }
        $order->cartProducts()->createMany($cartProductsData);
        return redirect()->route('customer.account');
    }
    public function updatePersonal() {

    }
}
