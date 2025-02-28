<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([[
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'Admin',
            'password' => '1234567890'
        ], [
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'Staff',
            'password' => '1234567890'

        ], [
            'name' => 'Applicant',
            'email' => 'applicant@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => '1234567890'
        ]]);
    }
}
