<?php namespace PaulAllen\Movies;

use System\Classes\PluginBase;
use PaulAllen\Movies\Models\Movie;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'PaulAllen\Movies\Components\Actors'       => 'actors',
            'PaulAllen\Movies\Components\ActorForm'    => 'actorform',
            'PaulAllen\Movies\Components\FilterMovies' => 'filtermovies'
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'PaulAllen\Movies\Widgets\ActorBox' => 'actorbox'
        ];
    }

    public function registerSettings()
    {
    }

    public function boot()
{
    \Event::listen('offline.sitesearch.query', function ($query) {

        // Search your plugin's contents
        $items = Movie::where('name', 'like', "%${query}%")
                        ->orWhere('description', 'like', "%${query}%")
                        ->get();

        // Now build a results array
        $results = $items->map(function ($item) use ($query) {

            // If the query is found in the title, set a relevance of 2
            $relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;

            $results = [
                'title'     => $item->name,
                'text'      => $item->description,
                'url'       => '/movie/' . $item->slug,
                'relevance' => $relevance, // higher relevance results in a higher
            ];

            if ($item->poster) {
                $results['thumb'] = $item->poster;
            }

            return $results;
        });

        // Error saving Movie

        return [
            'provider' => 'Movie', // The badge to display for this result
            'results'  => $results,
        ];
    });
}
}
