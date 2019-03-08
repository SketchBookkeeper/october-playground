<?php namespace PaulAllen\Profile;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        UsersController::extendFormFields(function($form, $model, $context){
            $form->addTabFields([
                'bio' => [
                    'label' => 'Bio',
                    'tab'   => 'Profile',
                    'type'  => 'textarea'
                ]
            ]);
        });
    }
}
