<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin'
        ]);
        Role::create([
            'name' => 'candidate',
            'display_name' => 'Candidate'
        ]);
        Role::create([
            'name' => 'employer',
            'display_name' => 'Employer'
        ]);
    }
}
