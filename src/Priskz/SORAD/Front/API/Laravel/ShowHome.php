<?php namespace Priskz\SORAD\Front\API\Laravel;

use Config, View;
use Priskz\SORAD\Front\API\Laravel\ShowHome\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowHome extends Responder
{
	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		return View::make(Config::get('sorad.front.view.prefix') . 'front.home');
	}
}