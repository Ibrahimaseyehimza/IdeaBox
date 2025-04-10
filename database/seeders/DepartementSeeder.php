<?php

namespace Database\Seeders;

use \App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Informatique'],
            ['name' => 'Ressources Humaines'],
            ['name' => 'Marketing'],
            ['name' => 'Finance'],
            ['name' => 'Ventes'],
            ['name' => 'Production'],
            ['name' => 'Logistique'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
