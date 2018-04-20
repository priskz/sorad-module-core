<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Alert, Redirect;
use Priskz\SORAD\Auth\API\Laravel\Login\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Login extends Responder
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
		if ($payload->getStatus() != 'logged_in')
		{
			Alert::danger('Login failed. Please try again.');
			
			return Redirect::back();
		}

		return Redirect::route('front.home');
	}
}