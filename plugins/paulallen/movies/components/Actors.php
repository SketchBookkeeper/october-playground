<?php
namespace PaulAllen\Movies\Components;

use Cms\Classes\ComponentBase;
use PaulAllen\Movies\Models\Actor;

class Actors extends ComponentBase
{
    public $actors;

    public function componentDetails()
    {
        return [
            'name'        => 'Actor List',
            'description' => 'List of actors'
        ];
    }

    public function defineProperties()
    {
        return [
            'results' => [
                'title'             => 'Number of Actors',
                'description'       => 'How many actors should be displayed',
                'default'           => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only Numbers Please'
            ],
            'orderby' => [
                'title'       => 'Order By',
                'description' => 'How should actors be sorted',
                'type'        => 'dropdown',
                'default'     => 'name asc',
                'options'     => $this->getSortOrderOptions()
            ]
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    public function getSortOrderOptions()
    {
        return [
            'name asc'  => 'Name (ascending)',
            'name desc' => 'Name (descending)'
        ];
    }

    protected function loadActors()
    {
        $query = Actor::all();

        if ($this->property('orderby') == 'name asc') {
            $query = $query->sortBy('name');
        } else {
            $query = $query->sortByDesc('name');
        }

        if ($this->property('results') > 0) {
            $query = $query->take($this->property('results'));
        }

        return $query;
    }
}
