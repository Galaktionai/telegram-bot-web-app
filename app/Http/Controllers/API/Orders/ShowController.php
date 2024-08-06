<?php

namespace App\Http\Controllers\API\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\Order\OrderProductsResource;
use App\Models\OrderProduct;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        $userId = $request->query('user_id');

        if ($userId) {
            // Если user_id присутствует в запросе, фильтруем заказы по user_id
            $orders = Order::where('user_id', $userId)->get();
        } else {
            // Если user_id нет в запросе, возвращаем все заказы
            $orders = Order::all();
        }
        return OrderResource::collection($orders);


        // $orderProducts = OrderProduct::with('product')->get();

        // // Возвращаем коллекцию ресурсов заказанных продуктов
        // return OrderProductsResource::collection($orderProducts);
    }
}
