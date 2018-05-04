<?php

namespace Priskz\SORAD\Auth\API\Laravel;

use Priskz\SORAD\Auth\API\Laravel\Register\Action;
use Priskz\SORAD\Responder\LaravelResponder as Responder;

class Register extends Responder
{
	/**
	 *	@var  array
	 */
	protected $status = [
		'not_created' => self::HTTP_BAD_REQUEST
	];

	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}
}