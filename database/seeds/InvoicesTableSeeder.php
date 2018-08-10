<?php

use Illuminate\Database\Seeder;
use Faker\Factory; // Faker
use App\Invoice; // DB Model
use App\Invoice_service; // DB Model

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
            $invoice = Invoice::create([
                'correlative' => 'TAV2018-'.mt_rand(1, 12),
                'id_client' => App\Client::all()->random()->id,
                'id_agent' => App\Agent::all()->random()->id,
                'luggage' => mt_rand(1, 23),
                'hand_luggage' => mt_rand(1, 10),
                'origin' => $faker->city,
                'destination' => $faker->city,
                'adults' => mt_rand(1, 5),
                'kids' => mt_rand(1, 5),
                'bebys' => mt_rand(1, 5),
                'exit_date' => '2018-'.mt_rand(1, 12).'-'.mt_rand(1, 28), // Math Random
                'exit_time' => mt_rand(1, 24).':'.mt_rand(1, 59), // Math Random
                'arrival_date' => '2018-'.mt_rand(1, 12).'-'.mt_rand(1, 28), // Math Random
                'exit_rate' => mt_rand(1, 1000),
                'price' => mt_rand(1, 10000),
                'id_user' => App\User::all()->random()->id,
            ]);

            /* Create 2-6 Items Per Invoice  */
            foreach (range(1, mt_rand(2,6)) as $j) {
                Invoice_service::create([
                    'id_invoice' => $invoice->id,
                    'id_service' => App\Service::all()->random()->id,
                    'id_user' => App\User::all()->random()->id,
                ]);
            }
        }
    }
}
