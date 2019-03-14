<?php namespace PaulAllen\Movies\Updates;

use PaulAllen\Movies\Models\Movie;
use October\Rain\Database\Updates\Seeder;
use Faker\Factory;

class SeedAllTables extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 100; $i++) {
            $movie_name = $faker->sentence($nbWords = 3, $variableNbWords = true);

            Movie::create([
                'name'        => $movie_name,
                'slug'        => str_slug($movie_name, '-'),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true ),
                'year'        => $faker->year($max = 'now')
            ]);
        }
    }

}
