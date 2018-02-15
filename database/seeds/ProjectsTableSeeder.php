<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Project::truncate();

        foreach(range(50, 200) as $i) {
            Project::create([
            	'customer_id' => rand(1, 50),
            	'user_id' => rand(1, 50),
                'project_name' => $faker->text(rand(10, 80)),
                'started_at' => $faker->date,
                'ended_at' => $faker->date,
                'project_status' => 'active',
                'budget' => $faker->numberBetween(1000, 9000),
                'project_description' => $faker->realText(rand(80, 600)),
            ]);
        }
    }
}
