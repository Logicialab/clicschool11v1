<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
            'course_id' => ['required', 'exists:courses,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'active' => ['required', 'boolean'],
            'order' => ['nullable', 'numeric'],
            'slug' => [
                'nullable',
                Rule::unique('quizzes', 'slug')->ignore($this->quiz),
                'max:255',
                'string',
            ],
        ];
    }
}
