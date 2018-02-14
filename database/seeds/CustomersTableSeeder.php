<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();
        Customer::truncate();

        foreach(range(50, 500) as $i) {
            Customer::create([
            	'civility' => 'Mr',
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
                'company' => $faker->firstname,
                'phone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'address_street' => $faker->address,
                'address_postal' => $faker->postcode,
                'address_city' => $faker->city,
                'address_country' => $faker->country,
                'user_id' => rand(1, 50),
            ]);
        }
    }
}
