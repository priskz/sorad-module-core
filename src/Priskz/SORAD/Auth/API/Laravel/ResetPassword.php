<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Password;
use Priskz\SORAD\Auth\API\Laravel\ResetPassword\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ResetPassword extends Responder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		Password::PASSWORD_RESET   => self::HTTP_OK,
		Password::INVALID_PASSWORD => self::HTTP_BAD_REQUEST,
		Password::INVALID_TOKEN    => seLf::HTTP_BAD_REQUEST,
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