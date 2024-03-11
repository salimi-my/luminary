<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 47; $i++) {
            DB::table('post_views')->insert([
                'ip_address' => '113.211.211.58',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'post_id' => fake()->numberBetween(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 13; $i++) {
            DB::table('post_views')->insert([
                'ip_address' => '113.211.211.58',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'post_id' => fake()->numberBetween(1, 50),
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('post_views')->insert([
                'ip_address' => '113.211.211.58',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'post_id' => fake()->numberBetween(1, 50),
                'created_at' => now()->subMonth(2),
                'updated_at' => now()->subMonth(2),
            ]);
        }
    }
}
