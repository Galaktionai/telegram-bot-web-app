<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class ProductResource extends JsonResource
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
            'image_url' => $this->ImageUrl,
            'product_images' => ProductImageResource::collection($this->productImages),
            'price' => $this->price,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'weight' => $this->weight,
            'calories' => $this->calories,
            'squirrels' => $this->squirrels,
            'fats' => $this->fats,
            'carbohydrates' => $this->carbohydrates,
            'size' => $this->size,
        ];
    }
}
