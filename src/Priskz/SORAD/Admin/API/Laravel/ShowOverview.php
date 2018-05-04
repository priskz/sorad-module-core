<?php

namespace Priskz\SORAD\Admin\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ShowOverview extends Responder
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