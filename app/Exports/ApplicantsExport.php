<?php

namespace App\Exports;

use App\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicantsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Applicant::with('disability')->get();
    }

    public function headings(): array
    {
        return [
            'م',
            'اسم المتقدم',
            'الجامعة',
            'الكلية',
            'القسم',
            'السنة الدراسية',
            'رقم الهاتف',
            'الرقم القومي',
            'تاريخ الميلاد',
            'السن',
            'المجال المشارك فيه',
            'نوع الإعاقة',
            'تاريخ التقديم'
        ];
    }

    public function map($applicant): array
    {
        return [
            $applicant->id,
            $applicant->name,
            $applicant->university,
            $applicant->college,
            $applicant->section,
            $applicant->academic_year,
            $applicant->phone_number,
            $applicant->national_id,
            $applicant->date_of_birth,
            $applicant->age,
            $applicant->participating_field,
            $applicant->disability ? $applicant->disability->name : 'لا يوجد',
            $applicant->created_at->format('Y-m-d H:i:s')
        ];
    }
}
