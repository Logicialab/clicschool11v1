<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompetitionUpdateRequest extends FormRequest
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
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
            'order' => ['nullable', 'numeric'],
            'slug' => [
                'nullable',
                Rule::unique('competitions', 'slug')->ignore(
                    $this->competition
                ),
                'max:255',
                'string',
            ],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
        ];
    }
}
