<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Alert, Redirect, Password;
use Priskz\SORAD\Auth\API\Laravel\ResetPassword\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ResetPassword extends Responder
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
		if ($payload->getStatus() == Password::PASSWORD_RESET)
		{
	        Alert::success('Password successfully reset!');

	        return Redirect::route('auth.login');
		}

		if ($payload->getStatus() == Password::INVALID_PASSWORD)
		{
	        Alert::danger('Password unsuccessfully reset! Reason: Invalid Password');

	        return Redirect::back()
				->withInput();
		}

		if ($payload->getStatus() == Password::INVALID_TOKEN)
		{
	        Alert::danger('Password unsuccessfully reset! Reason: Invalid Token');

	        return Redirect::back()
				->withInput();
		}

		if ($payload->getStatus() == Password::INVALID_USER)
		{
	        Alert::danger('Password unsuccessfully reset! Reason: Invalid User');

	        return Redirect::back()
				->withInput();
		}
	}
}