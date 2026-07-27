<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'department_code' => 'required|string|max:50|unique:departments,department_code',
            'department_name' => 'required|string|max:255',
            'office_name'     => 'required|string|max:255',
            'description'     => 'nullable|string',
            'is_active'       => 'required|boolean',
        ];
    }
}