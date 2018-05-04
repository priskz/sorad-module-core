<?php

namespace Priskz\SORAD\Account\API\Laravel\ShowEdit;

use Auth;
use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
{
	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 *	Get Request Data
	 */
	public function parseRequest()
	{
		parent::parseRequest();

		if(Auth::check())
		{
			$this->request['user_id'] = Auth::user()->getKey();
		}
	}
}
