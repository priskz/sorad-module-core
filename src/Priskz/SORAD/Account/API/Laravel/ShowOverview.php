<?php namespace Priskz\SORAD\Account\API\Laravel;

use Alert, Auth, Config, Input, Redirect, Route, View;
use Priskz\SORAD\Account\API\Laravel\ShowOverview\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

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
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		if ($payload->getStatus() != 'found')
		{
			return Redirect::route(Config::get('sorad.account.view.prefix') . 'front.home');
		}

		return View::make(Config::get('sorad.account.view.prefix') . 'account.overview')
			->with('user', $payload->getData()->first());
	}

	/**
	 *	Get Request Data
	 */
	public function getRequestData()
	{
		$requestData = Input::all();

		$requestParamData = Route::getCurrentRoute()->parametersWithoutNulls();

		if ($requestParamData)
		{
			$requestData = array_merge($requestData, $requestParamData);
		}

		// Add the user_id to the request data.
		$requestData['user_id'] = Auth::user()->getKey();

		return $requestData;
	}
}