<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Redirect;
use Priskz\SORAD\Auth\API\Laravel\ForgotPassword\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ForgotPassword extends Responder
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
		if($payload->getStatus() != 'passwords.sent')
		{
			 dd('Invalid email, please try again!');

			return Redirect::back()
				->withInput();
		}

		dd('An email containing a link to reset your password has been sent!');

        return Redirect::route('auth.password.forgot');
	}
}