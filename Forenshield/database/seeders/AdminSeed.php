<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'nic' => '111111111V',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'is_admin' => 1
        ]);
    }
}
