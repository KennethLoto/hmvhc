<?php

namespace Database\Seeders;

use App\Models\TypesOfDisease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesOfDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypesOfDisease::factory()
            ->times(200)
            ->create();
    }
}
