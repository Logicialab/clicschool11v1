<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StudentAnswerQuizUpdateRequest extends FormRequest
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
            'questionQuiz_id' => ['required', 'exists:question_quizs,id'],
            'student_id' => ['required', 'exists:students,id'],
            'text' => ['required', 'max:255', 'string'],
            'is_correct' => ['nullable', 'boolean'],
        ];
    }
}
