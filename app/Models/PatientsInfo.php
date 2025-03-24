<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'patients_info'; // Table name in snake_case for consistency

    protected $fillable = [
        // Personal Information
        'firstName',
        'middleName',
        'lastName',
        'suffix',

        // Address
        'province',
        'municipality',
        'barangay',
        'street',

        // Contact Information
        'contactNumber',
        'email',
    ];
}
