<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'supplier_code' => [

                'required',
                'string',
                'max:50',

                Rule::unique('suppliers', 'supplier_code')
                    ->ignore($this->supplier->id),

            ],

            'supplier_name' => 'required|string|max:255',

            'contact_person' => 'nullable|string|max:255',

            'contact_number' => 'nullable|string|max:50',

            'email' => 'nullable|email|max:255',

            'address' => 'nullable|string',

            'tin_number' => 'nullable|string|max:30',

            'remarks' => 'nullable|string',

            'is_active' => 'required|boolean',

        ];
    }
}