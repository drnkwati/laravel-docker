<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        Task::factory(15)->create();

        return;

        // or
        $faker = Factory::create('en');

        foreach (range(1, 30) as $value) {
            // DB::table('tasks')->insert(['title' => $faker->catchPhrase, 'description' => $faker->sentence]);
            Task::create(['title' => $faker->catchPhrase, 'description' => $faker->sentence]);
        }
    }
}
