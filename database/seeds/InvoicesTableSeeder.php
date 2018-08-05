<?php

use Illuminate\Database\Seeder;
use Faker\Factory; // Faker
use App\Invoice; // DB Model

class InvoicesTableSeeder extends Seeder
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
            Invoice::create([
                'id_client' => App\Client::all()->random()->id,
                'id_agent' => App\Agent::all()->random()->id,
                'type' => mt_rand(1, 2),
                'ticket_type' => mt_rand(1, 5),
                'exit_date' => '2018-'.mt_rand(1, 12).'-'.mt_rand(1, 28), // Math Random
                'arrival_date' => '2018-'.mt_rand(1, 12).'-'.mt_rand(1, 28), // Math Random
                'price' => mt_rand(1, 10000),
                'id_user' => App\User::all()->random()->id,
            ]);
        }
    }
}
