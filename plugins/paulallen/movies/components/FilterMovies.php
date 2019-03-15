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
    public $years;
    public $activeYear;
    public $activeGenres;
    protected $per_page = 6;

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
        $this->years = $this->movieYears();
        $this->activeGenres = Input::get('genres', []);
        $this->activeYear = Input::get('year');
    }

    /**
     * Filter Movies
     *
     * @param boolean $retry Should function run again if not movies are found.
     *
     * @return LengthAwarePaginator
     */
    protected function filterMovies($retry = true)
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
            // http://php.net/manual/en/functions.anonymous.php
            // https://stackoverflow.com/questions/34896236/laravel-where-has-passing-additional-arguments-to-function

            $query->whereHas('genres', function($query) use ($genres) {
                // whereHas() allows us to join the tables where genre and movie pivot.
                // Then we do a IN compare against the genre ids provided.
                // https://laravel.io/forum/04-07-2014-search-post-by-many-tags

                $query->whereIn('genre_id', $genres);
            });
        })
        ->when($year, function($query, $year) {
            $query->where('year', $year);
        })
        ->paginate($this->per_page);

        // If none are found retry at the first page.
        if ($retry && $movies->count() <= 0) {
            Input::merge(['page' => 1]); // Override page input.
            $movies = $this->filterMovies(false); // Set $retry to false to avoid an endless loop.
        }

        return $movies;
    }

    /**
     * On Filter Movies
     */
    public function onFilterMovies()
    {
        $movies = $this->filterMovies();

        return [
            '#movies' => $this->renderPartial(
                'filtermovies::list', ['movies' => $movies]
            )
        ];
    }

    /**
     * Movie Years
     *
     * Get all the unique years for movies
     *
     * @return Array
     */
    protected function movieYears()
    {
        $years = Movie::orderBy('year', 'desc')
                    ->get()
                    ->pluck('year')
                    ->unique()
                    ->toArray();

        $years = array_combine($years, $years);

        return $years;
    }
}
