<?php namespace PaulAllen\Movies;

use System\Classes\PluginBase;
use PaulAllen\Movies\Models\Movie;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'PaulAllen\Movies\Components\Actors'    => 'actors',
            'PaulAllen\Movies\Components\ActorForm' => 'actorform'
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

            // Optional: Add an age penalty to older results. This makes sure that
            // newer results are listed first.
            // if ($relevance > 1 && $item->published_at) {
            //     $relevance -= $this->getAgePenalty($item->published_at->diffInDays(Carbon::now()));
            // }

            return [
                'title'     => $item->name,
                'text'      => $item->description,
                'url'       => '/movie/' . $item->slug,
                // 'thumb'     => $item->images->first(), // Instance of System\Models\File
                'relevance' => $relevance, // higher relevance results in a higher
                                           // position in the results listing
                // 'meta' => 'data',       // optional, any other information you want
                                           // to associate with this result
                // 'model' => $item,       // optional, pass along the original model
            ];
        });

        return [
            'provider' => 'Movie', // The badge to display for this result
            'results'  => $results,
        ];
    });
}
}
