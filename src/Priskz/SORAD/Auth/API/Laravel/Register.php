<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Auth, Redirect;
use Priskz\SORAD\Auth\API\Laravel\Register\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Register extends Responder
{
	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		if($payload->getStatus() != 'created')
		{
			switch($payload->getStatus())
			{
				case 'unique_email':
					dd('Email already exists.');
				break;

				case 'unique_username':
					dd('Username already exists.');
				break;

				default:
					// Set error messages.
					foreach($payload->getData()->all() as $message)
					{
						dd($message);
					}
				break;
			}

			return Redirect::back();
		}

		// Log the newly register user in before sending them off.
		Auth::loginUsingId($payload->getData()->getKey());

		// Set sucess message.
		dd('Thanks for registering!');

		return Redirect::route('front.home');
	}
}