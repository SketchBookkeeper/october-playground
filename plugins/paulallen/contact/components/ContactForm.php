<?php namespace PaulAllen\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Contact Form',
            'description' => 'A simple contact form'
        ];
    }

    public function onSend()
    {
        $vars = [
            'name'    => Input::get('name'),
            'email'   => Input::get('email'),
            'content' => Input::get('content')
        ];

        $validation_rules = [
            'name'    => 'required',
            'email'   => 'required|email',
            'content' => 'required'
        ];

        $validator = Validator::make(
            $vars,
            $validation_rules
        );

        // Bail if fails
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        Mail::send('paulallen.contact::mail.message', $vars, function($message) {
            $message->to('admin@test.com', 'Admin Guy');
        });
    }
}
