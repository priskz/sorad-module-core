<?php namespace Priskz\SORAD\Front\API\Laravel\ShowHome;

use Priskz\SORAD\Action\Laravel\AbstractAction;
use Priskz\Payload\Payload;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [];

	/**
	 *	Main Method
	 */
	public function __invoke($requestData)
	{
		// Process Action Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		if($actionDataPayload->getStatus() != 'valid')
		{
			return $actionDataPayload;
		}

		// Init the execute data array.
		$executeData = [];

		// Execute the domain.
		return $this->execute($executeData);
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		
	}
}