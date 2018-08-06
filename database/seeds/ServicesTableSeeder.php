<?php

use Illuminate\Database\Seeder;
use Faker\Factory; // Faker
use App\Service; // DB Model

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create(); // Create a instance of the faker/factory
        foreach (range(1, 5) as $i) {
            Service::create([
                'name' => $faker->name,
                'description' => $faker->name,
                'id_user' => App\User::all()->random()->id,
            ]);
        }
    }
}
