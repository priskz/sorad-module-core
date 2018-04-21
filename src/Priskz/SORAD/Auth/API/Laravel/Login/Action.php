<?php namespace Priskz\SORAD\Auth\API\Laravel\Login;

use Auth;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'email', 'password'
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
		'email'    => 'required',
		'password' => 'required',
	];

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
		$returnData = [
			'status' => 'logged_failed',
			'data'   => false
		];

		if(filter_var($data['email'], FILTER_VALIDATE_EMAIL))
		{
			// Attempt the log in by email.
			$attempt = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);
		}
		else
		{
			// Attempt the log in by username.
			$attempt = Auth::attempt(['username' => $data['email'], 'password' => $data['password']], true);
		}

		if($attempt)
		{
			// Set return data.
			$returnData['data']   = Auth::user();
			$returnData['status'] = 'logged_in';
		}

		return new Payload($returnData['data'], $returnData['status']);
	}
}