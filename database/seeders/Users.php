<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('test123'),
                'role' => 'admin',
            ],
            [
                'name' => 'affiliate',
                'email' => 'affiliate@example.com',
                'password' => Hash::make('test123'),
                'role' => 'afiliator',
            ],
        ]);
    }
}
