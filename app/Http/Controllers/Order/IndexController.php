<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = Order::paginate(16);
        return view('order.index', compact('orders'));
    }
}
