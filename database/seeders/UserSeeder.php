<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hongsan.com.tw',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@hongsan.com.tw',
            'password' => Hash::make('test123'),
        ]);
    }
}
