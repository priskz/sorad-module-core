<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Redirect;
use Priskz\SORAD\Auth\API\Laravel\Logout\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Logout extends Responder
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
		if($payload->getStatus() != 'logged_out')
		{
			dd('Logout failed. Please try again.');

			return Redirect::back();
		}

		return Redirect::route('front.home');
	}
}