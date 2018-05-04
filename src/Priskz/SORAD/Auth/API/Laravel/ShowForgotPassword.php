<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ShowForgotPassword extends Responder
{
	/**
	 *	@var  string
	 */
	protected $type = self::HEADER_HTML;

	/**
	 *	Set the body of the response.
	 */
	public function setBody()
	{
		$this->body = View::make(Config::get('sorad.auth.view.prefix') . 'auth.password-forgot');
	}
}