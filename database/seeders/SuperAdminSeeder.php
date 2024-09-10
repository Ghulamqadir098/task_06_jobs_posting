<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= new User();

        $user->name = 'Super Admin';
        $user->email = 'admin@gmail.com';
          // Password is 'password'
        $user->password = bcrypt('12345678');
        $user->save();

       $role=Role::find(1);

        $user->roles()->attach($role->id);
    }
}
