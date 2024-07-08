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
            'name.required' => 'จำเป็นต้องระบุชื่อบริษัท',
            'name.string' => 'ชื่อบริษัทต้องเป็นสตริง',
            'name.max' => 'ชื่อบริษัทต้องไม่ยาวเกิน 255 ตัวอักษร',
            'address.required' => 'จำเป็นต้องระบุที่อยู่บริษัท',
            'address.string' => 'ที่อยู่บริษัทต้องเป็นสตริง',
            'address.max' => 'ที่อยู่บริษัทต้องไม่ยาวเกิน 255 ตัวอักษร',
            'email.required' => 'จำเป็นต้องระบุอีเมลบริษัท',
            'email.email' => 'อีเมลบริษัทต้องเป็นอีเมลที่ถูกต้อง',
            'email.unique' => 'อีเมลบริษัทต้องไม่ซ้ำกับอีเมลอื่น',
            'logo.image' => 'โลโก้บริษัทต้องเป็นรูปภาพ',
            'logo.dimensions' => 'โลโก้บริษัทต้องมีขนาดอย่างน้อย 100x100 พิกเซล',
            'website.url' => 'เว็บไซต์บริษัทต้องเป็น URL ที่ถูกต้อง',
        ];
    }
}
