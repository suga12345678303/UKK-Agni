<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin', // ← TAMBAHKAN INI
        ]);

        // Tambahkan user biasa juga untuk testing
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'user', // ← User biasa
        ]);
    }
}