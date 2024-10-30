<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
            'subject_id' => ['required', 'exists:subjects,id'],
            'title' => ['required', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:courses,slug', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'body' => ['required', 'max:255', 'string'],
            'order' => ['nullable', 'numeric'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
