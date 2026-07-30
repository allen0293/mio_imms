<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Header
            |--------------------------------------------------------------------------
            */

            'request_type' => [
                'required',
                'in:Asset,Consumable,Service',
            ],

            'needed_date' => [
                'nullable',
                'date',
                'after_or_equal:today',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'requested_by' => [
                'required',
                'exists:employees,id',
            ],

            'purpose' => [
                'required',
                'string',
                'max:500',
            ],

            'justification' => [
                'nullable',
                'string',
            ],

            'remarks' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Items
            |--------------------------------------------------------------------------
            */

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.equipment_model_id' => [
                'required',
                'exists:equipment_models,id',
            ],

            'items.*.description' => [
                'nullable',
                'string',
                'max:255',
            ],

            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'items.*.unit_of_measure' => [
                'required',
                'string',
                'max:50',
            ],

            'items.*.estimated_unit_cost' => [
                'required',
                'numeric',
                'min:0',
            ],

            'items.*.remarks' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Attachments
            |--------------------------------------------------------------------------
            */

            'attachments' => [
                'nullable',
                'array',
            ],

            'attachments.*' => [
                'file',
                'mimes:pdf,doc,docx,xlsx,jpg,jpeg,png',
                'max:5120',
            ],

        ];
    }

    /**
     * Custom Messages
     */
    public function messages(): array
    {
        return [

            'items.required' => 'Please add at least one item.',

            'items.min' => 'Please add at least one item.',

            'items.*.equipment_model_id.required' =>
                'Please select an equipment model.',

            'items.*.quantity.min' =>
                'Quantity must be at least 1.',

            'items.*.estimated_unit_cost.min' =>
                'Estimated unit cost cannot be negative.',

        ];
    }

    /**
     * Friendly Attribute Names
     */
    public function attributes(): array
    {
        return [

            'department_id' => 'department',

            'requested_by' => 'requested by',

            'needed_date' => 'needed date',

            'items.*.equipment_model_id' => 'equipment model',

            'items.*.estimated_unit_cost' => 'estimated unit cost',

        ];
    }

    protected function prepareForValidation(): void
        {
            $this->merge([
                'purpose' => trim((string) $this->purpose),
                'justification' => trim((string) $this->justification),
                'remarks' => trim((string) $this->remarks),
            ]);
        }
}