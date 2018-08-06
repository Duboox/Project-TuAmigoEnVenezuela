<?php

use Illuminate\Database\Seeder;
use Faker\Factory; // Faker
use App\Ticket_type; // DB Model

class Ticket_typesTableSeeder extends Seeder
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
            Ticket_type::create([
                'name' => $faker->name,
                'description' => $faker->name,
                'id_user' => App\User::all()->random()->id,
            ]);
        }
    }
}
