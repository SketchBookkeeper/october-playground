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
        $request = Request::post();
        $movies = null;

        if (isset($request['genres'])) {
            // $movie_id = DB::select( 'select movie_id from paulallen_movies_genre_movie where genre_id in ()' );
            $movies = new Movie();
            $test = $movies->belongsToGenres();
        }
    }
}
