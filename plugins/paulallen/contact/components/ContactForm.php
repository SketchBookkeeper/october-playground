<?php
namespace PaulAllen\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;

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

        Mail::send('paulallen.contact::mail.message', $vars, function($message) {
            $message->to('admin@test.com', 'Admin Guy');
        });
    }
}
