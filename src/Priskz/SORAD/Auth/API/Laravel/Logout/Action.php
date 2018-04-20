<?php namespace Priskz\SORAD\Auth\API\Laravel\Logout;

use Auth;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;

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
		// Process Domain Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		// Verify that the data has been sanitized and validated.
		if ($actionDataPayload->getStatus() != 'valid')
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
		// Attempt the log in.
		$user = Auth::logout();

		if(Auth::user())
		{
			return $payload = new Payload($user, 'logout_failed');
		}

		return $payload = new Payload($user, 'logged_out');
	}
}
