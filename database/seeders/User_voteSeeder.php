<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_voteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have foreign key constraints set for 'user_id' and 'lihkg_id' columns
        // Make sure you have existing users and lihkg records to reference in the foreign key fields.

        // Generate random vote_status values (0 or 1)
        $voteStatusValues = [0, 1];

        // Get an array of existing user IDs and lihkgs post IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        $lihkgsIds = DB::table('lihkgs')->pluck('id')->toArray();

        for ($i = 1; $i <= 40; $i++) {
            // Replace 'users' and 'lihkg' with the actual table names for users and lihkg posts
            $randomUserId = $userIds[array_rand($userIds)];
            $randomLihkgsId = $lihkgsIds[array_rand($lihkgsIds)];

            // Generate a random vote_status value (0 or 1)
            $randomVoteStatus = $voteStatusValues[array_rand($voteStatusValues)];

            DB::table('user_votes')->insert([
                'user_id' => $randomUserId,
                'lihkg_id' => $randomLihkgsId,
                'vote_status' => $randomVoteStatus,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
