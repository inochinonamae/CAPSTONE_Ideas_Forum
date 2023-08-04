<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LihkgSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Get an array of existing user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            // Randomly select 'user_id' from the existing IDs
            $randomUserId = $userIds[array_rand($userIds)];

            DB::table('lihkgs')->insert([
                'user_id' => $randomUserId,
                'message' => $faker->realText(100),
                'vote_count' => 0,  
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
