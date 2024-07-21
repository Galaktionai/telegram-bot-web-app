<?php

namespace App\Http\Requests\User;

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
          'name' => 'required|string',
          'email' => 'string',
          'password' => 'required|string|confirmed',
          'telegram_id' => 'nullable|string',
          'address' => 'nullable|string',
          'entrance' => 'nullable|string',
          'apartment' => 'nullable|string',
        ];
    }
}
