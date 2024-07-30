<?php

namespace App\Http\Controllers\OrderProduct;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(OrderProduct $orderProduct)
    {
        $orderProduct->delete();

        return redirect()->route('order.index');
    }
}
