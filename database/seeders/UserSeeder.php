<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' => 'admin',
        'nama_lengkap' => 'Administrator',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin123'),
        'role' => 'admin'
    ]);

    User::create([
        'name' => 'kasir',
        'nama_lengkap' => 'Kasir',
        'email' => 'kasir@gmail.com',
        'password' => Hash::make('kasir123'),
        'role' => 'kasir'
    ]);

    }
}
