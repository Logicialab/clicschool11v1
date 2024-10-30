<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FormationDetailUpdateRequest extends FormRequest
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
            'formation_id' => ['required', 'exists:formations,id'],
            'title' => ['nullable', 'max:255', 'string'],
            'url' => ['nullable', 'url'],
            'description' => ['nullable', 'max:255', 'string'],
            'file' => ['nullable', 'file'],
        ];
    }
}
