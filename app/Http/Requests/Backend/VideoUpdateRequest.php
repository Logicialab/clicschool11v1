<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
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
            'url' => ['required', 'url'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'file' => ['file', 'max:1024', 'nullable'],
            'active' => ['required', 'boolean'],
            'slug' => [
                'nullable',
                Rule::unique('videos', 'slug')->ignore($this->video),
                'max:255',
                'string',
            ],
        ];
    }
}
