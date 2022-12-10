<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            Season::updateOrCreate([

                'name' => fake()->text(15),
                'describe' => fake()->text(30),
                'start' =>fake()->date('Y-m-d'),
                'end' =>fake()->date('Y-m-d')
            ]);
        }
    }
}
