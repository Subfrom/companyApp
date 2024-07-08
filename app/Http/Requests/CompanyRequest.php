<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'nullable|file|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required',
            'name.string' => 'Company name must be a string',
            'name.max' => 'Company name must not be greater than 255 characters',
            'address.required' => 'Company address is required',
            'address.string' => 'Company address must be a string',
            'address.max' => 'Company address must not be greater than 255 characters',
            'email.required' => 'Company email is required',
            'email.email' => 'Company email must be a valid email address',
            'email.unique' => 'Company email must be unique',
            'logo.image' => 'Company logo must be an image',
            'logo.dimensions' => 'Company logo must be at least 100x100 pixels',
            'website.url' => 'Company website must be a valid URL',
        ];
    }
}
