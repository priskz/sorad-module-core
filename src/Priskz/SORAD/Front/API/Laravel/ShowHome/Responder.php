<?php

namespace Priskz\SORAD\Front\API\Laravel\ShowHome;

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
		$this->body = View::make(Config::get('sorad.front.view.prefix') . 'front.home');
	}
}