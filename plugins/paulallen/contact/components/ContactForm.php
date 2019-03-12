<?php namespace PaulAllen\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Flash;
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

        // Bail if fails validation
        if ($validator->fails()) {
            // One way to do this with flash messages...

            // $errors = $validator->errors();

            // foreach ($errors->all() as $error) {
            //     Flash::error($error);
            //     break;
            // }

            // return;

            // Or
            // This will find the element on the page with the Id of 'result'
            // and inject the contents for 'messages.htm' in that element via
            // AJAX.
            return [
                '#result' => $this->renderPartial(
                    'contactform::messages',
                    [
                        'errorMsgs' => $validator->messages()->all(),
                    ]
                ),
                'status' => 'failed validation'
            ];
        }

        Mail::send('paulallen.contact::mail.message', $vars, function($message) {
            $message->to('admin@test.com', 'Admin Guy');
        });

        Flash::success('Message Sent');

        return [
            '#result' => 'Thanks!, We\'ll get in touch soon',
            'status'  => 'message sent'
        ];
    }
}
