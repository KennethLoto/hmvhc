<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfDisease extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'types_of_diseases';

    protected $fillable = [
        'nameOfDisease',
        'shortDescription',
        'category',
    ];
}
