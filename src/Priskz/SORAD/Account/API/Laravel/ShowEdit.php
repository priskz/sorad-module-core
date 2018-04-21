<?php namespace Priskz\SORAD\Account\API\Laravel;

use Auth, Config, Input, Redirect, Route, View;
use Priskz\SORAD\Account\API\Laravel\ShowEdit\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowEdit extends Responder
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
		if($payload->getStatus() != 'found')
		{
			// Retrieve error messages for display.
			foreach($payload->getData()->all() as $message)
			{
				dd($message);
			}

			return Redirect::back();
		}

		return View::make(Config::get('sorad.account.view.prefix') . 'account.edit')
			->with('user', $payload->getData()->first());
	}

	/**
	 *	Get Request Data
	 */
	public function getRequestData()
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
