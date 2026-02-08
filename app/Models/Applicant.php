<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'university',
        'college',
        'section',
        'academic_year',
        'phone_number',
        'whatsapp_number',
        'national_id',
        'date_of_birth',
        'age',
        'participating_field',
        'disability_id',
    ];

    public function disability()
    {
        return $this->belongsTo(Disability::class);
    }
}
