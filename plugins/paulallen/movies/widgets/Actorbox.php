<?php
namespace PaulAllen\Movies\Widgets;

use Backend\Classes\FormWidgetBase;
use PaulAllen\Movies\Models\Actor;

class ActorBox extends FormWidgetBase
{
    protected $defaultAlias = 'actorbox';

    public function widgetDetails()
    {
        return [
            'name'        => 'Actor Box',
            'description' => 'Select for adding actors'
        ];
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('widget');
    }

    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = Actor::all()->pluck('full_name', 'id');
        $this->vars['name'] = $this->formField->getName() . '[]';

        if (!empty($this->getLoadValue())) {
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }

    public function getSaveValue($actors)
    {
        if (!$actors) {
            return [];
        }

        $actors = array_map(function($actor) {
            if (! is_numeric($actor)) {
                $actor = explode(' ', $actor);

                if (count($actor) === 0) {
                    return '';
                }

                $new_actor = new Actor;
                $new_actor->name = $actor[0];

                if (isset($actor[1])) {
                    $new_actor->lastname = $actor[1];
                }

                $new_actor->save();

                return $new_actor->id;
            }

            return $actor;
        }, $actors);

        return $actors;
    }

    public function loadAssets()
    {
        $this->addCss('select2/dist/css/select2.min.css');
        $this->addJs('select2/dist/js/select2.min.js');
    }
}
