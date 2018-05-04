<?php

namespace Priskz\SORAD\Account\API\Laravel\ShowEdit;

use User;
use Priskz\SORAD\Action\LaravelAction;

class Action extends LaravelAction
{
	/**
	 * @var  array  Data configuration.
	 */
	protected $config = [
		'user_id' => 'required',
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

		// Execute the action.
		return User::get([['field' => 'id', 'value' => $payload->getData()['user_id'], 'operator' => '=', 'or' => false]]);
	}
}