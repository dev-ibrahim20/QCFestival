<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
