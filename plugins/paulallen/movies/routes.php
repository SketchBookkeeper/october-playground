<?php
use PaulAllen\Movies\Models\Movie;
use PaulAllen\Movies\Models\Actor;
use PaulAllen\Movies\Models\Genre;
use Faker;
use Response;

Route::get('/json-movies', function() {
    $count = Input::get('count', 10);

    return Movie::take($count)->get();
});

Route::get('/seed-movies', function() {
    $count = Input::get('count', 0);

    $faker = Faker\Factory::create();

    for ($i = 0; $i < $count; $i++) {
        $name = $faker->realText($maxNbChars = 20);
        $genres = Genre::all()->random(3);

        $movie = new Movie();

        $movie->name = $name;
        $movie->slug = str_slug($name);
        $movie->year = $faker->year($max = 'now');
        $movie->created_at = $faker->dateTimeThisYear($max = 'now');
        $movie->published = rand(0,1);

        $movie->save();

        $movie->genres()->attach($genres);
    }

    return Movie::get();
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

Route::get('sitemap.xml', function() {
    $movies = Movie::all();
    $genres = Genre::all();

    return Response::view(
        'paulallen.movies::sitemap',
        ['movies' => $movies, 'genres' => $genres]
    )->header('Content-Type', 'text/xml');
});
