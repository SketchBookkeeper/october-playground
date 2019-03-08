<?php namespace PaulAllen\Profile;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;

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
        // Extend user model to have 'bio' as a fillable field.
        UserModel::extend(function($model) {
            $model->addFillable([
                'bio'
            ]);
        });

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
