<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable',
            'info' => 'nullable',

            'preview_image' => 'nullable',
            'product_images' => 'nullable|array',

            'weight' => 'nullable',
            'calories' => 'nullable',
            'squirrels' => 'nullable',
            'fats' => 'nullable',
            'carbohydrates' => 'nullable',

            'price' => 'nullable',
            'count' => 'nullable',
            'size' => 'nullable',

            'is_published' => 'nullable',
            'category_id' => 'nullable',
        ];
    }
}
