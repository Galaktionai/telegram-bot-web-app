<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        // Получаем все OrderProduct, связанные с данным заказом
        $order_products = OrderProduct::where('order_id', $order->id)->get();
        
        // Извлекаем все product_id из коллекции $order_products
        $product_ids = $order_products->pluck('product_id');
        
        // Получаем все продукты, id которых находятся в массиве $product_ids
        $products = Product::whereIn('id', $product_ids)->get();

        return view('order.show', compact('order', 'order_products', 'products'));
    }
}
