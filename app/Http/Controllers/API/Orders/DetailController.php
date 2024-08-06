<?php

namespace App\Http\Controllers\API\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __invoke(Order $order)
    {
        return new OrderResource($order);
    }
}
