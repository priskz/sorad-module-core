<?php

namespace Priskz\SORAD\Account\API\Laravel\ShowOverview;

use User;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'user_id' => 'required'
	];

	/**
	 *	Main Method
	 */
	public function __invoke($requestData)
	{
		// Process Domain Data Keys
		$payload = $this->processor->process($requestData, $this->config);

		// Verify that the data has been sanitized and validated.
		if($payload->getStatus() != 'valid')
		{
			return $payload;
		}

		// Execute the action.
		return $this->execute($payload->getData()['user_id']);
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		return User::get([['field' => 'id', 'value' => $data, 'operator' => '=', 'or' => false]]);
	}
}