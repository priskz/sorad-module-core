<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowLogin extends Responder
{
	/**
	 *	Generate Response
	 */
	public function generateResponse($data)
	{
		return View::make(Config::get('sorad.auth.view.prefix') . 'auth.login');
	}
}