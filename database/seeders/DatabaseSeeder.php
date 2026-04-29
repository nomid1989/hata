<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'kravets.lviv@gmail.com'],
            [
                'name' => 'Dmytro Kravets',
                'password' => Hash::make('hata2026'),
                'role' => UserRole::Owner,
                'email_verified_at' => now(),
            ],
        );

        User::updateOrCreate(
            ['email' => 'manager@hata.diwave.company'],
            [
                'name' => 'Manager',
                'password' => Hash::make('hata2026'),
                'role' => UserRole::Manager,
                'email_verified_at' => now(),
            ],
        );
    }
}
