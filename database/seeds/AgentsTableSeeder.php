<?php

use Illuminate\Database\Seeder;
use Faker\Factory; // Faker
use App\Agent; // DB Model

class AgentsTableSeeder extends Seeder
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
            Agent::create([
                'name' => $faker->name,
                'last_name' => 'Pullok',
                'email' => $faker->safeEmail,
                'phone' => $faker->tollFreePhoneNumber,
                'birthday_date' => '2018-'.mt_rand(1, 12).'-'.mt_rand(1, 28), // Math Random
                'rating' => mt_rand(1, 5),
                'id_user' => App\User::all()->random()->id,
            ]);
        }
    }
}
