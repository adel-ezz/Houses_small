<?php

namespace Database\Seeders;

use App\Models\Proberty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            Proberty::updateOrCreate([
                'title' => fake()->text(15),
                'describe' =>fake()->text(30)
            ]);
        }

    }
}
