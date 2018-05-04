<?php

namespace Priskz\SORAD\Front\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ShowHome extends Responder
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