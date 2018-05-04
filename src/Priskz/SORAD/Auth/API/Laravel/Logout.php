<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Priskz\SORAD\Auth\API\Laravel\Logout\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class Logout extends Responder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		'logged_out'    => self::HTTP_OK,
		'logout_failed' => self::HTTP_BAD_REQUEST
	];

	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}
}