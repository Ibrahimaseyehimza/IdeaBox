<?php

namespace Database\Seeders;

use \App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['name' => 'Projet A', 'description' => 'Description du projet A'],
            ['name' => 'Projet B', 'description' => 'Description du projet B'],
            ['name' => 'Projet C', 'description' => 'Description du projet C'],
            ['name' => 'Projet D', 'description' => 'Description du projet D'],
            ['name' => 'Projet E', 'description' => 'Description du projet E'],
        ];

        foreach ($projects as $project) {
            // Project::create(['name' => $project]);
            Project::create($project);
        }
    }
}
