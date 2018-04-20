<?php namespace Priskz\SORAD\Account\API\Laravel\ShowOverview;

use User;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'user_id'
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
		'user_id' => 'required'
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
		return $this->execute($actionDataPayload->getData()['user_id']);
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		return User::get([['field' => 'id', 'value' => $data, 'operator' => '=', 'or' => false]]);
	}
}