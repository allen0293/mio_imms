<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'model_code' => 'required|string|max:50|unique:equipment_models,model_code',

            'model_name' => 'required|string|max:255',

            'equipment_category_id' => 'required|exists:equipment_categories,id',

            'equipment_brand_id' => 'required|exists:equipment_brands,id',

            'manufacturer_part_number' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'is_active' => 'required|boolean',

        ];
    }
}