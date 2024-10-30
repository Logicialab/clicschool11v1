<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FormationParticipantUpdateRequest extends FormRequest
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
            'student_id' => ['required', 'exists:students,id'],
            'time' => ['nullable', 'max:255', 'string'],
        ];
    }
}