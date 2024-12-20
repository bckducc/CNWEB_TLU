<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $urgencies = ['Low', 'Medium', 'High'];
        $statuses = ['Open', 'In Progress', 'Resolved'];

        for ($i = 0; $i < 50; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50),
                'reported_by' => $faker->optional()->name(),
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->paragraph(),
                'urgency' => $faker->randomElement($urgencies),
                'status' => $faker->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}