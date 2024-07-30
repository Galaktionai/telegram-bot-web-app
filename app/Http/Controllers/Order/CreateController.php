<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CreateController extends Controller
{
    public function __invoke()
    {
        $order = Order::all();
        return view('order.create', compact('order'));
    }
}
