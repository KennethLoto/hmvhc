<?php

namespace Database\Seeders;

use App\Models\TypesOfDisease;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Admin',
                'password' => '1234567890',
            ],
            [
                'name' => 'Almeria',
                'email' => 'almeria@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Biliran',
                'email' => 'biliran@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Cabucgayan',
                'email' => 'cabucgayan@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Caibiran',
                'email' => 'caibiran@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Culaba',
                'email' => 'culaba@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Kawayan',
                'email' => 'kawayan@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Maripipi',
                'email' => 'maripipi@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
            [
                'name' => 'Naval',
                'email' => 'naval@example.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'Municipal User',
                'password' => '1234567890',
            ],
        ]);

        TypesOfDisease::factory()->createMany([
            [
                'nameOfDisease' => 'Diabetes',
                'shortDescription' => 'Diabetes is a chronic condition that affects how the body processes blood sugar, leading to high glucose levels.',
                'category' => 'Chronic Disease',
            ],
            [
                'nameOfDisease' => 'Monkeypox',
                'shortDescription' => 'Monkeypox is a viral disease that causes fever, rash, and swollen lymph nodes, often transmitted through contact with infected animals.',
                'category' => 'Viral Disease',
            ],
            [
                'nameOfDisease' => 'Pneumonia',
                'shortDescription' => 'Pneumonia is an infection that inflames the air sacs in one or both lungs, causing fever and difficulty breathing.',
                'category' => 'Respiratory Disease',
            ],
            [
                'nameOfDisease' => 'Tuberculosis',
                'shortDescription' => 'Tuberculosis is a bacterial infection that primarily affects the lungs, causing coughing, weight loss, and fever.',
                'category' => 'Respiratory Disease',
            ],
            [
                'nameOfDisease' => 'Dengue Fever',
                'shortDescription' => 'Dengue fever is a mosquito-borne viral infection that causes flu-like symptoms, including high fever, severe headaches, and joint pain.',
                'category' => 'Vector-Borne Disease',
            ],
            [
                'nameOfDisease' => 'Leptospirosis',
                'shortDescription' => 'Leptospirosis is a bacterial infection spread through water contaminated with animal urine, leading to fever, muscle pain, and organ complications.',
                'category' => 'Bacterial Disease',
            ],
            [
                'nameOfDisease' => 'Hypertension',
                'shortDescription' => 'Hypertension, or high blood pressure, is a condition where blood pressure levels are persistently elevated, increasing the risk of heart disease and stroke.',
                'category' => 'Chronic Disease',
            ],
            [
                'nameOfDisease' => 'Typhoid Fever',
                'shortDescription' => 'Typhoid fever is a bacterial infection that spreads through contaminated food and water, causing fever, weakness, and abdominal pain.',
                'category' => 'Bacterial Disease',
            ],
            [
                'nameOfDisease' => 'Gastroenteritis',
                'shortDescription' => 'Gastroenteritis is an infection of the intestines causing diarrhea, vomiting, and stomach cramps, often due to contaminated food or water.',
                'category' => 'Digestive Disease',
            ],
            [
                'nameOfDisease' => 'Influenza',
                'shortDescription' => 'Influenza, or flu, is a contagious respiratory infection that causes fever, chills, cough, and body aches.',
                'category' => 'Viral Disease',
            ],
        ]);
    }
}
