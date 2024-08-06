<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\ProductResource;

class OrderProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'info' => $this->info,
            'weight' => $this->weight,
            'calories' => $this->calories,
            'squirrels' => $this->squirrels,
            'fats' => $this->fats,
            'carbohydrates' => $this->carbohydrates,
            'preview_image' => $this->preview_image,
            'size' => $this->size,
            'price' => $this->price,
            'category' => $this->category,
            'count' => $this->count,
            'product_id' => $this->product_id,
            'order_id' => $this->order_id,
        ];
    }
}
