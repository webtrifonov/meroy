<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'updated_at', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }
    public function show(Order $order) {
        $order->load('user')->load(['cartProducts' => function ($cartProductQuery) {
            $cartProductQuery->select('id', 'order_id', 'product_id', 'amount')->with(['product' => function ($productQuery) {
                $productQuery->select('id', 'title', 'price');
            }]);
        }])->get();
        return view('admin.order.order', compact('order'));
    }
    public function update(Request $request, Order $order) {

        $order->update($request->all());
        return redirect()->route('order.index');
    }
}
