<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 👤 Créer un admin si nécessaire
        User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'role' => 'admin',
            'password' => Hash::make('111'),
        ]);

        // 👥 Créer 5 utilisateurs simples
        // User::factory()->count(5)->create([
        //     'role' => 'user',
        // ]);

        // 👥 Créer un utilisateur 'Isaa' si nécessaire
        User::firstOrCreate([
            'email' => 'user@gmail.com'
        ], [
            'name' => 'Isaa',
            'role' => 'user',
            'password' => Hash::make('111'),
        ]);
    }
}
