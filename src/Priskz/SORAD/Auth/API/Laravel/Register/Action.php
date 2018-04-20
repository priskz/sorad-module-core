<?php namespace Priskz\SORAD\Auth\API\Laravel\Register;

use Priskz\SORAD\Action\Laravel\AbstractAction;
use AuthRoot;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'username', 'password', 'password_confirmation', 'email', 'first_name', 'last_name'
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
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
	public function __invoke($requestData)
	{
		// Process Domain Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		// Verify that the data has been sanitized and validated.
		if ($actionDataPayload->getStatus() != 'valid')
		{
			return $actionDataPayload;
		}

		// Execute the action.
		return $this->execute($actionDataPayload->getData());
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		return AuthRoot::register($data);
	}
}