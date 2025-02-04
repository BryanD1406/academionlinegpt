<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Leonardo Carlos Veliz Arce',
            'email' => '73057970@continental.edu.pe',
            'password' => bcrypt('Leonardo1224')
        ]);

        $user->assignRole('Admin');
    }
}
