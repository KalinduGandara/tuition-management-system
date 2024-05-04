<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'registration_id' => 'required|exists:registrations,id',
            'month' => 'required|numeric|min:1|max:12',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'registration_id.required' => 'Student is required.',
            // 'registration_id.exists' => 'The selected registration is invalid.',
            // 'month.required' => 'The month field is required.',
            // 'month.numeric' => 'The month must be a number.',
            // 'month.min' => 'The month must be at least :min.',
            // 'month.max' => 'The month may not be greater than :max.',
            // 'date.required' => 'The date field is required.',
            // 'date.date' => 'The date must be a date.',
            // 'amount.required' => 'The amount field is required.',
            // 'amount.numeric' => 'The amount must be a number.',
            // 'amount.min' => 'The amount must be at least :min.',
            // 'type.required' => 'The type field is required.',
            // 'type.string' => 'The type must be a string.',
        ];
    }
}
