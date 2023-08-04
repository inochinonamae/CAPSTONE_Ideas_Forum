<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10), // Generate a random cute name
                'email' => Str::random(10) . '@example.com', // Generate a random email
                'email_verified_at' => now(), // Set the current timestamp to mark the email as verified
                'password' => Hash::make('11111111'), // Hash the password '11111111'
                'remember_token' => Str::random(10), // Generate a random token for 'remember me' functionality
                'created_at' => now(), // Set the current timestamp for 'created_at'
                'updated_at' => now(), // Set the current timestamp for 'updated_at'
            ]);
        }
    }
}
