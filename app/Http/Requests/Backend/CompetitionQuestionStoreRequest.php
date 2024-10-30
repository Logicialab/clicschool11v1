<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionQuestionStoreRequest extends FormRequest
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
            'competition_id' => ['required', 'exists:competitions,id'],
            'question' => ['required', 'max:255', 'string'],
            'question_type' => ['required', 'max:255', 'string'],
        ];
    }
}
