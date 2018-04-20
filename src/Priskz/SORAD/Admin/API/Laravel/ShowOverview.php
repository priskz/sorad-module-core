<?php namespace Priskz\SORAD\Admin\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowOverview extends Responder
{
	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		return View::make(Config::get('sorad.admin.view.prefix') . 'admin.overview');
	}
}