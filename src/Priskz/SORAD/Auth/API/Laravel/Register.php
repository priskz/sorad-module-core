<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Alert, Auth, Redirect;
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
					Alert::danger('Email already exists.');
				break;

				case 'unique_username':
					Alert::danger('Username already exists.');
				break;

				default:
					// Set error messages.
					foreach($payload->getData()->all() as $message)
					{
						Alert::danger($message);
					}
				break;
			}

			return Redirect::back();
		}

		// Log the newly register user in before sending them off.
		Auth::loginUsingId($payload->getData()->getKey());

		// Set sucess message.
		Alert::success('Thanks for registering!');

		return Redirect::route('front.home');
	}
}