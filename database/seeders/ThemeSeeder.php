<?php

namespace Database\Seeders;

use \App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            ['name' => 'Technologie'],
            ['name' => 'Environnement'],
            ['name' => 'Santé'],
            ['name' => 'Éducation'],
            ['name' => 'Culture'],
            ['name' => 'Économie'],
            ['name' => 'Société'],
        ];
        foreach ($themes as $theme) {
            Theme::create(['name' => $theme['name']]);        }
    }
}
