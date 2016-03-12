<?php namespace Fencus\ContactUs\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use Validator;
use Mail;
use Redirect;

class ContactUs extends ComponentBase
{
	
	public $message;

    public function componentDetails()
    {
        return [
            'name'        => 'ContactUs Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
        		'email' => [
        				'title'       => 'E-Mail',
        				'description' => 'E-Mail of recevier',
        				'default'     => '',
        				'type'        => 'string'
        		],
        ];
    }
    
    public function onRun()
    {
    	$email = $this->property('email');
    	if(!$email)
    	{
    		$this->message = 'Recevier Mail: not defined.';
    	}
    	else
    	{
    		$validator = Validator::make(
    				[
    						'E-Mail' => $email
    				],
    				[
    						'E-Mail' => 'required|email'
    				]
    				);
    		if ($validator->fails())
    		{
    			$this->message = 'Recevier Mail: Wrong format.';
    		}
    	}
    }
    
    
    public function onSendMail()
    {
    	$email = input('email');
    	$name = input('name');
    	$content = input('message');
    	$to = $this->property('email');
    	
    	$validator = Validator::make(
    			[
	    				'Name' => $name,
	    				'Content' => $content,
	    				'E-Mail' => $email
	    		],
    			[
    					'Name' => 'required|min:1',
    					'Content' => 'required|min:1',
    					'E-Mail' => 'required|email'
    			]);
    	
    	if ($validator->fails()) {
    		$errors = $validator->messages();
    		$errorMessage = "";
	    	foreach ($errors->all() as $error)
	    	{
			    $errorMessage .= $error.', ';
			}
    		throw new ApplicationException($errorMessage);
    	}
    	
    	$vars = [
	    				'name' => $name,
	    				'content' => $content,
	    				'email' => $email
	    		];
    	
    	Mail::send('fencus.contactus::mail.message', $vars, function($message) use ($to, $email, $name) {
    	
    		$message->from($to);
    		$message->to($to);
    		$message->replyTo($email, $name);
    	
    	});
    	
    	return Redirect::to('/');
    }

}