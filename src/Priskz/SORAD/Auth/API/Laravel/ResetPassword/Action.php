<?php

namespace Priskz\SORAD\Auth\API\Laravel\ResetPassword;

use Auth, Hash, Password;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'email'					=> 'required',
		'password'   			=> 'required|confirmed',
		'password_confirmation' => 'required',
		'token'					=> 'required',
	];

	/**
	 *	Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *	Main Method
	 */
	public function execute($data)
	{
		// Process Domain Data Keys
		$payload = $this->processor->process($data, $this->config);

		// Verify that the data has been sanitized and validated.
		if( ! $payload->isStatus(Payload::STATUS_VALID))
		{
			return $payload;
		}

		$status = Password::reset($payload->getData(), function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
		});

	    return new Payload($data, $status);
	}
}
