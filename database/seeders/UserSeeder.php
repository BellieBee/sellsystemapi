<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@test.dev',
                'password' => Hash::make('123456'),
                'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@test.dev',
            'password' => Hash::make('123456'),
            'is_admin' => 0
        ]);
    }
}
