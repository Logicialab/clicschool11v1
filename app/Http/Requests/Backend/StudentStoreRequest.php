<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'classe_id' => ['required', 'exists:classes,id'],
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
            'nickname' => ['nullable', 'max:255', 'string'],
            'slug' => ['nullable', 'unique:students,slug', 'max:255', 'string'],
            'home_adress' => ['nullable', 'max:255', 'string'],
            'street' => ['nullable', 'max:255', 'string'],
            'neighborhood' => ['nullable', 'max:255', 'string'],
            'city' => ['nullable', 'max:255', 'string'],
            'school_name' => ['nullable', 'max:255', 'string'],
            'student_level' => ['nullable', 'max:255', 'string'],
            'name_guardian' => ['nullable', 'max:255', 'string'],
            'Profession' => ['nullable', 'max:255', 'string'],
            'etablissement_travail' => ['nullable', 'max:255', 'string'],
        ];
    }
}
