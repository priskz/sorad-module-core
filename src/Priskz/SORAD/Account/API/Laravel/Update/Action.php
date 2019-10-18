<?php

namespace Priskz\SORAD\Account\API\Laravel\Update;

use Priskz\Payload\Payload;
use Priskz\SORAD\Action\LaravelAction;
use User;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'user_id'               => 'required',
		'username'   			=> 'required',
		'password'   			=> 'confirmed|min:6',
		'password_confirmation' => '',
		'email'    	 			=> 'required|email',
		'first_name' 			=> 'required',
		'last_name'  			=> 'required',
	];

	/**
	 *	Constructor
	 */
	public function __construct(Processor $processor)
	{
		parent::__construct($processor);
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

		// @todo: Refactor this logic out of this class.

		// Get and ensure the model exists.
		$userPayload = User::get([['field' => 'id', 'value' => $payload->getData('user_id'), 'operator' => '=', 'or' => false]]);

		if($userPayload->getStatus() != 'found')
		{
			return $userPayload;
		}

		return User::update($payload->getData(), $userPayload->getData()->first());
	}
}