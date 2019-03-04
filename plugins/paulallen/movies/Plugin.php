<?php namespace PaulAllen\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
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
