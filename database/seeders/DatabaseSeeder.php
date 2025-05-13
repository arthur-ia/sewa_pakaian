<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('2'), // Pastikan untuk enkripsi password
        ]);
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('2'), // Pastikan untuk enkripsi password
            'level' => 'owner'
        ]);
        User::create([
            'name' => 'courier',
            'email' => 'courier@gmail.com',
            'password' => Hash::make('2'), // Pastikan untuk enkripsi password
            'level' => 'kurir'
        ]);
    }
}
