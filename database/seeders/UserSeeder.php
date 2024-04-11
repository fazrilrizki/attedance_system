<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $role = Role::create([
            'name' => 'Super Admin',
        ]);
        
        $user = User::create([
            'name' => 'Admin Attedance',
            'email' => 'adminattedance@gmail.com',
            'password' => Hash::make(12345678)
        ]);

        $user->assignRole($role);
    }
}
