<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubjectUpdateRequest extends FormRequest
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
            'classe_id' => ['required', 'exists:classes,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'slug' => [
                'nullable',
                Rule::unique('subjects', 'slug')->ignore($this->subject),
                'max:255',
                'string',
            ],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }
}
