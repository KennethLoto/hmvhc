<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfDisease extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'typesOfDiseases';

    protected $fillable = [
        'nameOfDisease',
        'shortDescription',
        'category',
    ];
}
