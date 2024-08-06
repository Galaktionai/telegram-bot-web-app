<?php

namespace App\Http\Requests\OrderProduct;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'info' => 'nullable|string',
            'weight' => 'nullable|string',
            'calories' => 'nullable|string',
            'squirrels' => 'nullable|string',
            'fats' => 'nullable|string',
            'carbohydrates' => 'nullable|string',
            'preview_image' => 'nullable|string',
            'size' => 'nullable|string',
            'price' => 'nullable|string',
            'category' => 'nullable|string',
            'count' => 'nullable|string',
            'product_id' => 'nullable|string',
            'order_id' => 'nullable|string',
        ];
    }
}
