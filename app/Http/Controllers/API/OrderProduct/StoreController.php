<?php

namespace App\Http\Controllers\API\OrderProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderProduct\StoreRequest;
use App\Models\OrderProduct;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $orderProduct = OrderProduct::create($data);
        return $orderProduct;
    }
}
