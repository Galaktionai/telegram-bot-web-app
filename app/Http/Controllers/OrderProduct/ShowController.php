<?php

namespace App\Http\Controllers\OrderProduct;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;

class ShowController extends Controller
{
    public function __invoke(OrderProduct $order_product)
    {
        return view('order_product.show', compact('order_product'));
    }
}
