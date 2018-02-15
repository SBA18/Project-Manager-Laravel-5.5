<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Task::truncate();

         foreach(range(500, 1000) as $i) {
            Task::create([
            	'project_id' => rand(1, 50),
            	'user_id' => rand(1, 50),
                'title' => $faker->text(rand(10, 80)),
                'started_at' => $faker->date,
                'ended_at' => $faker->date,
                'status' => 'active',
                'progress' => rand(10, 100),
                'price' => $faker->numberBetween(1000, 9000),
                'affected_to' => $faker->firstname,
                'task_decription' => $faker->realText(rand(80, 600)),
            ]);
        }
    }
}
