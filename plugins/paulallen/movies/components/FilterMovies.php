<?php
namespace PaulAllen\Movies\Components;

use Cms\Classes\ComponentBase;
use PaulAllen\Movies\Models\Movie;
use PaulAllen\Movies\Models\Genre;
use Request;
use DB;
use Input;
use Validator;

class FilterMovies extends ComponentBase
{
    public $movies;
    public $genres;

    public function componentDetails()
    {
        return [
            'name'        => 'Filter Movies',
            'description' => 'Filter movies'
        ];
    }

    public function onRun()
    {
        $this->movies = $this->filterMovies();
        $this->genres = Genre::all();
    }

    public function filterMovies()
    {
        $genres = Input::get('genres');
        $year   = Input::get('year');

        // Conditional Query
        //
        // Build a SQL query based on the Request,
        // when() will add parts of the query if the first
        // argument is met.
        //
        // https://laravel.com/docs/5.5/queries#conditional-clauses

        $movies = Movie::when($genres, function($query, $genres) {
            // Pass the variable $genres with variable inheriting to the closure (it's like a callback).
            // https://stackoverflow.com/questions/34896236/laravel-where-has-passing-additional-arguments-to-function

            $query->whereHas('genres', function($query) use ($genres) {
                // whereHas() allows us to join the tables where genre and movie pivot.
                // Then we do a IN compare against the genre ids provided
                // https://laravel.io/forum/04-07-2014-search-post-by-many-tags
                //
                // It all comes out to look like this...
                //
                // select * from `paulallen_movies_` where exists
                // (select * from `paulallen_movies_genres_` inner join `paulallen_movies_genre_movie`
                // on `paulallen_movies_genres_`.`id` =
                // `paulallen_movies_genre_movie`.`genre_id` where `paulallen_movies_`.`id` =
                // `paulallen_movies_genre_movie`.`movie_id` and `genre_id` in ('1', '2'))

                $query->whereIn('genre_id', explode(',',$genres));
            });
        })
        ->when($year, function($query, $year) {
            $query->where('year', $year);
        })
        ->get();
    }
}
