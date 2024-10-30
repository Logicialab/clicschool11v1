<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['nullable', 'max:255', 'string'],
            'phone' => ['nullable', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'ip' => ['nullable', 'max:255'],
            'type' => ['nullable', 'max:255', 'string'],
        ];
    }
}
