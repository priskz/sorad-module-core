<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowRegister extends Responder
{
	/**
	 *	Generate Response
	 */
	public function generateResponse($data)
	{
		return View::make(Config::get('sorad.auth.view.prefix') . 'auth.register');
	}
}
