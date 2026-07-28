<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquipmentBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'brand_code' => [
            'required',
            'max:50',
            Rule::unique('equipment_brands')
                ->ignore($this->route('equipment_brand')),
        ],

        'brand_name' => 'required|max:255',
        'description' => 'nullable',
        'is_active' => 'required|boolean',
    ];
}
}