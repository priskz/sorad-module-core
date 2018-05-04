<?php

namespace Priskz\SORAD\Auth\API\Laravel\ResetPassword;

use Password;
use Priskz\SORAD\Responder\LaravelResponder;

class Responder extends LaravelResponder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		Password::PASSWORD_RESET   => self::HTTP_OK,
		Password::INVALID_PASSWORD => self::HTTP_BAD_REQUEST,
		Password::INVALID_TOKEN    => self::HTTP_BAD_REQUEST,
		Password::INVALID_USER     => self::HTTP_BAD_REQUEST
	];

	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}
}