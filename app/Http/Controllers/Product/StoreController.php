<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductImage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $productImages = $data['product_images'];
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        unset($data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($productImages as $productImage) {
            $currentImages = ProductImage::where('product_id', $product->id)->get();

            if(count($currentImages) > 3) continue;
            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        return redirect()->route('product.index');
    }
}
