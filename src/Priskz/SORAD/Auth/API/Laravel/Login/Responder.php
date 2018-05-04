<?php

namespace Priskz\SORAD\Auth\API\Laravel\Login;

use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
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