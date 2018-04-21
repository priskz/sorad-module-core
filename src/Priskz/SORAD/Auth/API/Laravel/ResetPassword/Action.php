<?php namespace Priskz\SORAD\Auth\API\Laravel\ResetPassword;

use Auth, Hash, Password;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'email', 'password', 'password_confirmation', 'token'
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
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
	public function __invoke($requestData)
	{
		// Process Domain Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		// Verify that the data has been sanitized and validated.
		if($actionDataPayload->getStatus() != 'valid')
		{
			return $actionDataPayload;
		}

		// Set the execute data.
		$executeData = $actionDataPayload->getData();

		// Execute the action.
		return $this->execute($executeData);
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		$status = Password::reset($data, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
		});

	    return $payload = new Payload($data, $status);
	}
}
