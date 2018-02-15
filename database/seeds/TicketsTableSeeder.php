<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Ticket::truncate();

         foreach(range(500, 1000) as $i) {
            Ticket::create([
            	'user_id' => rand(1, 50),
                'title' => $faker->text(rand(10, 80)),
                'customer_id' => rand(1, 50),
                'level' => 'normal',
                'status' => 'opened',
                'description' => $faker->realText(rand(80, 600)),
            ]);
        }
    }
}
