<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select(['*'])->with(['user', 'cartProducts'])->get();
        return view('admin.order.index', compact('orders'));
    }
}
