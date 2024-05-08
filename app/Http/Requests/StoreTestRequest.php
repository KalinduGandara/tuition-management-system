<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
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
            'date' => 'required|date',
            'type' => 'required|string',
            'marks' => 'required|array',
            'marks.*' => 'required|numeric|min:0|max:100',
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
            'date.required' => 'A date is required',
            'date.date' => 'The date must be a valid date',
            'type.required' => 'A type is required',
            'type.string' => 'The type must be a string',
            'marks.required' => 'Marks are required',
            'marks.array' => 'Marks must be an array',
            'marks.*.required' => 'A mark is required for each student',
            'marks.*.numeric' => 'Each mark must be a number',
            'marks.*.min' => 'Each mark must be at least 0',
            'marks.*.max' => 'Each mark must not be greater than 100',
        ];
    }
}
