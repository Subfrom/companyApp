<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'จำเป็นต้องระบุชื่อพนักงาน',
            'first_name.string' => 'ชื่อพนักงานต้องเป็นสตริง',
            'first_name.max' => 'ชื่อพนักงานต้องไม่ยาวเกิน 255 ตัวอักษร',
            'last_name.required' => 'จำเป็นต้องระบุนามสกุลพนักงาน',
            'last_name.string' => 'นามสกุลพนักงานต้องเป็นสตริง',
            'last_name.max' => 'นามสกุลพนักงานต้องไม่ยาวเกิน 255 ตัวอักษร',
            'company_id.required' => 'จำเป็นต้องระบุบริษัท',
            'company_id.exists' => 'บริษัทที่ระบุไม่มีอยู่ในระบบ',
            'email.required' => 'จำเป็นต้องระบุอีเมลพนักงาน',
            'email.email' => 'อีเมลพนักงานต้องเป็นอีเมลที่ถูกต้อง',
            'email.unique' => 'อีเมลพนักงานต้องไม่ซ้ำกับอีเมลอื่น',
            'phone.string' => 'เบอร์โทรศัพท์ต้องเป็นสตริง',
            'phone.max' => 'เบอร์โทรศัพท์ต้องไม่ยาวเกิน 255 ตัวอักษร'
        ];
    }
}
