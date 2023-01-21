<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Art;
class ArtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 50 product records 
        for ($i = 0; $i < 50; $i++) {
            Art::create([
                'name' => $faker->name('male'|'female'),
                'description' => $faker->text(20),
                'price' => $faker->randomNumber(3),
                'availability' => $faker->boolean(50),
                'category' => $faker->company()
            ]);
        }
    }
}
