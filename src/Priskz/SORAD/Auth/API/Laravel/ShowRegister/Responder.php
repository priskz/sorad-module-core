<?php

namespace Priskz\SORAD\Auth\API\Laravel\ShowRegister;

use Config, View;
use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
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
		$this->body = View::make(Config::get('sorad.auth.view.prefix') . 'auth.register');
	}
}
