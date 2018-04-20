<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowResetPassword extends Responder
{
	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		return View::make(Config::get('sorad.auth.view.prefix') . 'auth.password-reset')
			->with('token', $payload['token']);
	}
}