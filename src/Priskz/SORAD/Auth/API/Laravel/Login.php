<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Priskz\SORAD\Auth\API\Laravel\Login\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class Login extends Responder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		'logged_in'     => self::HTTP_OK,
		'log_in_failed' => self::HTTP_BAD_REQUEST
	];

	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}
}