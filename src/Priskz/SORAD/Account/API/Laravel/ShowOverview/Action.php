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
	public function execute($requestData)
	{
		// Process Domain Data Keys
		$payload = $this->processor->process($requestData, $this->config);

		// Verify that the data has been sanitized and validated.
		if($payload->getStatus() != 'valid')
		{
			return $payload;
		}

		return User::get([['field' => 'id', 'value' => $payload->getData()['user_id'], 'operator' => '=', 'or' => false]]);
	}
}