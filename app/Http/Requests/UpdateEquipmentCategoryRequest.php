<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquipmentCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('equipment_categories', 'category_code')->ignore($this->equipmentCategory->id),
            ],
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
    }
}