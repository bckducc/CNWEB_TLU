<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->paragraph(),
                'urgency' => $faker->randomElement(['low', 'medium', 'high']),
                'status' => $faker->randomElement(['open', 'in progress', 'resolved']),
                'computer_id' => $faker->numberBetween(1, 50), // Ensure this matches existing computer IDs
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}