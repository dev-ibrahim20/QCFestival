<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'academic_year' => 'required|string|max:255',
            'phone_number' => 'required|digits:11|regex:/^01/',
            'whatsapp_number' => 'required|digits:11|regex:/^01/',
            'national_id' => 'required|digits:14|unique:applicants',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer|min:20|max:30',
            'participating_field' => 'required|string|max:255',
            'disability_id' => 'nullable|exists:disabilities,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'name.string' => 'يجب أن يكون الاسم نصاً',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرف',

            'university.required' => 'حقل الجامعة             مطلوب',
            'university.string' => 'يجب أن تكون الجامعة نصاً',
            'university.max' => 'الجامعة يجب ألا تتجاوز 255 حرف',

            'college.required' => 'حقل الكلية مطلوب',
            'college.string' => 'يجب أن تكون الكلية نصاً',
            'college.max' => 'الكلية يجب ألا تتجاوز 255 حرف',

            'section.required' => 'حقل القسم مطلوب',
            'section.string' => 'يجب أن يكون القسم نصاً',
            'section.max' => 'القسم يجب ألا يتجاوز 255 حرف',

            'academic_year.required' => 'حقل السنة الدراسية م            طلوب',
            'academic_year.string' => 'يجب أن تكون السنة الدراسية نصاً',
            'academic_year.max' => 'السنة الدراسية يجب ألا تتجاوز 255 حرف',

            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'phone_number.digits' => 'رقم الهاتف يجب أن يكون 11 رقم بالضبط',
            'phone_number.regex' => 'رقم الهاتف يجب أن يبدأ بـ 01',

            'whatsapp_number.required' => 'حقل رقم الواتساب مطلوب',
            'whatsapp_number.digits' => 'رقم الواتساب يجب أن يكون 11 رقم بالضبط',
            'whatsapp_number.regex' => 'رقم الواتساب يجب أن يبدأ بـ 01',

            'national_id.required' => 'حقل الرقم القومي مطلوب',
            'national_id.digits' => 'الرقم القومي يجب أن يكون 14 رقم بالضبط',
            'national_id.unique' => 'هذا الرقم القومي مسجل بالفعل',

            'date_of_birth.required' => 'حقل تاريخ الميلاد مطلوب',
            'date_of_birth.date' => 'تاريخ الميلاد يجب أن يكون تاريخاً صحيحاً',

            'age.required' => 'حقل العمر مطلوب',
            'age.integer' => 'ا            لعمر يجب أن يكون رقماً',
            'age.min' => 'العمر يجب أن يكون 18 سنة على الأقل',

            'participating_field.required' => 'حقل المجال المشارك مطلوب',
            'participating_field.string' => 'يجب أن يكون المجال المشارك نصاً',
            'participating_field.max' => 'المجال المشارك يجب ألا يتجاوز 255 حرف',

            'disability_id.exists' => 'نوع الإعاقة المختار غير صحيح',
        ];
    }
}
