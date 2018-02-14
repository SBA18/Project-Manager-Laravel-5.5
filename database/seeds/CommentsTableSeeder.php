<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Comment::truncate();

        foreach(range(50, 500) as $i) {
            Comment::create([
            	'customer_id' => rand(1, 50),
            	'user_id' => rand(1, 50),
                'body' => $faker->realText(rand(80, 400)),
            ]);
        }
    }
}
