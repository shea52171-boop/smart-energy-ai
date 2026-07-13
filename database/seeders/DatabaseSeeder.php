<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin tiruan untuk demo UAS
        User::updateOrCreate(
            ['email' => 'Shea52171@gmail.com'], // Email untuk login 
            [
                'name' => 'Admin Smart Energy',
                'password' => Hash::make('Wulandari'), // Password untuk login
            ]
        );
    }
}