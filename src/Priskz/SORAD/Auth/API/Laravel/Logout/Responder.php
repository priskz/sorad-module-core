<?php

namespace Priskz\SORAD\Auth\API\Laravel\Logout;

use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
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