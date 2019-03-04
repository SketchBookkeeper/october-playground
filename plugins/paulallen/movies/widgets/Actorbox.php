<?php
namespace PaulAllen\Movies\Widgets;

use Backend\Classes\FormWidgetBase;
use Config;
// use PaulAllen\Movies\Models\Actor;

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
        return $this->makePartial('widget');
    }

    public function loadAssets()
    {
        $this->addCss('select2/dist/css/select2.min.css');
        $this->addJs('select2/dist/js/select2.min.js');
    }
}
