<?php namespace PaulAllen\Movies;

use System\Classes\PluginBase;

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
}
