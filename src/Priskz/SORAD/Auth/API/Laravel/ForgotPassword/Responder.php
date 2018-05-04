<?php

namespace Priskz\SORAD\Auth\API\Laravel\ForgotPassword;

use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		'passwords.sent' => self::HTTP_OK
	];

	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}
}