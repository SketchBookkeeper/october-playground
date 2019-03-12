<?php
use PaulAllen\Movies\Models\Movie;
use PaulAllen\Movies\Models\Actor;
use Faker;

Route::get('/json-movies', function() {
    $count = Input::get('count', 10);

    return Movie::take($count)->get();
});

Route::get('/seed-actors', function() {
    $count = Input::get('count', 0);

    $faker = Faker\Factory::create();

    for ($i = 0; $i < $count; $i++) {
        Actor::create([
            'name'     => $faker->firstName(),
            'lastname' => $faker->lastName()
        ]);
    }

    return Actor::get();
});
