<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'user_id' => 'nullable|string',
            'full_name' => 'nullable|string',
            'address' => 'nullable|string',
            'entrance' => 'nullable|string',
            'apartment' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'info' => 'nullable|string',
            'delivery_price' => 'nullable|string',
            'quantity_products' => 'nullable|string',
            'discount' => 'nullable|string',
            'all_price' => 'nullable|string',
            'type' => 'nullable|string',
            'status' => 'nullable|string',
        ];
    }
}
