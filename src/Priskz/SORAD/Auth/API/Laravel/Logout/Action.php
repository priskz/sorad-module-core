<?php

namespace Priskz\SORAD\Auth\API\Laravel\Logout;

use Auth;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	/**
	 *	Logic
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

		// Attempt the log in.
		$user = Auth::logout();

		if(Auth::user())
		{
			return $payload = new Payload($user, 'logout_failed');
		}

		return $payload = new Payload($user, 'logged_out');
	}
}
