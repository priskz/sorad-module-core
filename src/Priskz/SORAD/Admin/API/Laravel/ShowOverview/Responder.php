<?php

namespace Priskz\SORAD\Admin\API\Laravel\ShowOverview;

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
		$this->body = View::make(Config::get('sorad.admin.view.prefix') . 'admin.overview');
	}
}