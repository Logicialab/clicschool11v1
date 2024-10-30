<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'formation_type_id' => ['required', 'exists:formation_types,id'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'status' => ['nullable', 'max:255', 'string'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'active' => ['required', 'boolean'],
            'slug' => [
                'nullable',
                Rule::unique('formations', 'slug')->ignore($this->formation),
                'max:255',
                'string',
            ],
        ];
    }
}
