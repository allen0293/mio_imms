<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'department_code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('departments', 'department_code')
                    ->ignore($this->department->id),
            ],

            'department_name' => 'required|string|max:255',
            'office_name'     => 'required|string|max:255',
            'description'     => 'nullable|string',
            'is_active'       => 'required|boolean',
        ];
    }
}