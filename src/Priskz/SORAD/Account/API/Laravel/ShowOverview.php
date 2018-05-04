<?php

namespace Priskz\SORAD\Account\API\Laravel;

use Auth, Input, Route;
use Priskz\SORAD\Account\API\Laravel\ShowOverview\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ShowOverview extends Responder
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
		$requestData = Input::all();

		$requestParamData = Route::getCurrentRoute()->parametersWithoutNulls();

		if($requestParamData)
		{
			$requestData = array_merge($requestData, $requestParamData);
		}

		// Add the user_id to the request data.
		$requestData['user_id'] = Auth::user()->getKey();

		return $requestData;
	}
}