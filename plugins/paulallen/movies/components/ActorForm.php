<?php
namespace PaulAllen\Movies\Components;

use Cms\Classes\ComponentBase;
use PaulAllen\Movies\Models\Actor;
use Input;
use Validator;
use Backend\Facades\BackendAuth as Auth;

class ActorForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Actor Form',
            'description' => 'Add Actors with a frontend form'
        ];
    }

    public function onSaveActor()
    {
        // First check that the user is logged in.
        if (!$this->user()) {
            return [
                'message' => 'You must be logged in to use this form',
                'type'    => 'error'
            ];
        }

        // Validate form inputs.
        $vars = [
            'firstname' => Input::get('firstname'),
            'lastname'  => Input::get('lastname')
        ];

        $validation_rules = [
            'firstname' => 'required',
            'lastname'  => 'required'
        ];

        $validator = Validator::make(
            $vars,
            $validation_rules
        );

        if ($validator->fails()) {
            return [
                'message' => $validator->errors()->first(),
                'type'    => 'error'
            ];
        };

        // Check if this new actor is already in the database.
        $existing_record = Actor::find(1)
            ->whereRaw( 'LOWER(`name`) like ?', strtolower($vars['firstname']) )
            ->whereRaw( 'LOWER(`lastname`) like ?', strtolower($vars['lastname']) )
            ->get();

        if (!$existing_record->isEmpty()) {
            return [
                'message' => 'That actor was already added',
                'type'    => 'warning'
            ];
        }

        // Passed all the check,
        // Save the new Actor
        $new_actor           = new Actor;
        $new_actor->name     = ucfirst($vars['firstname']);
        $new_actor->lastname = ucfirst($vars['lastname']);
        $new_actor->save();

        return [
            'message' => 'Added Actor',
            'type'    => 'success',
        ];
    }

    public function user()
    {
        if (Auth::getUser()) {
            return Auth::getUser();
        }

        return null;
    }
}
