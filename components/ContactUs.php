<?php namespace Fencus\ContactUs\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use Validator;

class ContactUs extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'ContactUs Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    
    
    public function onSendMail()
    {
    	$email = input('email');
    	$name = input('name');
    	$message = input('name');
    	
    	$validator = Validator::make(
    			[
    					'Name' => $name,
    					'Message' => $message,
    					'E-Mail' => $email
    			],
    			[
    					'Name' => 'required|min:1',
    					'Message' => 'required|min:1',
    					'E-Mail' => 'required|email'
    			]
    			);
    	if ($validator->fails()) {
    		$errors = $validator->messages();
    		$errorMessage = "";
	    	foreach ($errors->all() as $error)
	    	{
			    $errorMessage .= $error.', ';
			}
    		throw new ApplicationException($errorMessage);
    	}
    	
    	
    }

}