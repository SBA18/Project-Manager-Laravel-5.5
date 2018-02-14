<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Customer;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::truncate();

        foreach(range(1, 50) as $i) {
            User::create([
                'name' => $faker->firstname,
                'username' => $faker->username,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'useruniqid' => bin2hex(random_bytes(90)),
            ]);
        }
    }
}
