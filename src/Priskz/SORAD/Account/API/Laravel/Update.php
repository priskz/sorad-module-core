<?php namespace Priskz\SORAD\Account\API\Laravel;

use Alert, Auth, Input, Redirect, Route, View;
use Priskz\SORAD\Account\API\Laravel\Update\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Update extends Responder
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
		if($payload->getStatus() != 'updated')
		{
			// Retrieve error messages for display.
			foreach($payload->getData()->all() as $message)
			{
				Alert::danger($message);
			}

			return Redirect::back();
		}

		Alert::success('Account successfully updated!');

		return Redirect::back();
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