<?php

namespace App\Http\Controllers\OrderProduct;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;

class IndexController extends Controller
{
    public function __invoke()
    {
        $order_products = OrderProduct::paginate(16);
        return view('order_product.index', compact('order_products'));
    }
}
