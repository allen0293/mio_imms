<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_number' => [
                'required',
                'string',
                'max:30',
                Rule::unique('employees', 'employee_number')->ignore($this->employee->id),
            ],
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'extension_name' => 'nullable|string|max:10',
            'gender' => 'nullable|in:Male,Female',
            'birthdate' => 'nullable|date',
            'position' => 'required|string|max:150',
            'department_id' => 'required|exists:departments,id',
            'office_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact_number' => 'nullable|string|max:30',
            'photo' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
        ];
    }
}