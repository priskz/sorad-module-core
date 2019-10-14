<?php

namespace Priskz\SORAD\Auth\API\Laravel\ForgotPassword;

use Auth;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	// Laravel Trait
	use ResetsPasswords;

	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'email' => 'required',
	];

	/**
	 *	Constructor
	 */
	public function __construct(PasswordBroker $passwords)
	{
		parent::__construct();
		$this->passwords = $passwords;
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

		$response = $this->passwords->sendResetLink($payload->getData(), function($email)
		{
			$email->subject('Password Reset');
		});

		return new Payload(null, $response);
	}
}