<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'brand_code' => 'required|max:50|unique:equipment_brands',

            'brand_name' => 'required|max:255',

            'description' => 'nullable',

            'is_active' => 'nullable|boolean',

        ];
    }
}