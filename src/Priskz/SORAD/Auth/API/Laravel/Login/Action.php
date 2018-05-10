<?php

namespace Priskz\SORAD\Auth\API\Laravel\Login;

use Auth;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'email'    => 'required',
		'password' => 'required',
	];

	/**
	 *	Logic
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

		// Set the execute data.
		$executeData = $payload->getData();

		// Init
		$returnData = [
			'status' => 'log_in_failed',
			'data'   => false
		];

		if(filter_var($data['email'], FILTER_VALIDATE_EMAIL))
		{
			// Attempt the log in by email.
			$attempt = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);
		}
		else
		{
			// Attempt the log in by username.
			$attempt = Auth::attempt(['username' => $data['email'], 'password' => $data['password']], true);
		}

		if($attempt)
		{
			// Set return data.
			$returnData['data']   = Auth::user();
			$returnData['status'] = 'logged_in';
		}

		return new Payload($returnData['data'], $returnData['status']);
	}
}