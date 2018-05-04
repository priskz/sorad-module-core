<?php

namespace Priskz\SORAD\Auth\API\Laravel\Register;

use Auth;
use Priskz\SORAD\Action\LaravelAction;
use AuthRoot;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'username'   			=> 'required',
		'password'   			=> 'required|confirmed',
		'password_confirmation' => 'required',
		'email'    	 			=> 'required|email',
		'first_name' 			=> 'required',
		'last_name'  			=> 'required'
	];

	/**
	 *	Main Method
	 */
	public function execute($data)
	{
		// Process Domain Data Keys
		$payload = $this->processor->process($data, $this->config);

		// Verify that the data has been sanitized and validated.
		if($payload->getStatus() != 'valid')
		{
			return $payload;
		}

		$registerPayload = AuthRoot::register($data);

		if($registerPayload->getStatus() != 'created')
		{
			return $registerPayload;
		}

		// Log the newly register user in before sending them off.
		Auth::loginUsingId($payload->getData()->getKey());

		return $registerPayload;
	}
}