<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseSolutionStoreRequest extends FormRequest
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
            'exercice_id' => ['required', 'exists:exercices,id'],
            'solution' => ['required', 'max:255', 'string'],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
        ];
    }
}
