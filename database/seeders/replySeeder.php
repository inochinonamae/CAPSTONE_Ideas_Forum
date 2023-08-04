<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class replySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have foreign key constraints set for 'user_id' and 'lihkgs_id' columns
        // Make sure you have existing users and lihkgs posts to reference in the foreign key fields.

        $faker = \Faker\Factory::create();

        // Get an array of existing user IDs and lihkgs post IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        $lihkgsIds = DB::table('lihkgs')->pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            // Randomly select 'user_id' and 'lihkgs_id' from the existing IDs
            $randomUserId = $userIds[array_rand($userIds)];
            $randomLihkgsId = $lihkgsIds[array_rand($lihkgsIds)];

            DB::table('replies')->insert([
                'user_id' => $randomUserId,
                'lihkgs_id' => $randomLihkgsId,
                'reply' => $faker->sentence, // Generate a random sentence for the reply content
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
