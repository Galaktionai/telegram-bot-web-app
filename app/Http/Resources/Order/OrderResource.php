<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\OrderProductsResource;
use App\Models\Order;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'user_id' => $this->user_id,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'entrance' => $this->entrance,
            'apartment' => $this->apartment,
            'phone_number' => $this->phone_number,
            'info' => $this->info,
            'delivery_price' => $this->delivery_price,
            'quantity_products' => $this->quantity_products,
            'discount' => $this->discount,
            'all_price' => $this->all_price,
            'size' => $this->size,
            'date' => $this->created_at->format('d.m.Y H:i'),
            'order_products' => OrderProductsResource::collection($this->orderProducts),
            // 'products' => $this->products,
            //'order_products' => $this->products,
            'type'  => $this->type,
            'status' => $this->status,
        ];
    }
}
