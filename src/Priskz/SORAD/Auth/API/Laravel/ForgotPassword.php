<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Priskz\SORAD\Auth\API\Laravel\ForgotPassword\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class ForgotPassword extends Responder
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