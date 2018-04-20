<?php namespace Priskz\SORAD\Account\API\Laravel\Update;

use User;
use Priskz\SORAD\Account\API\Laravel\Update\Processor;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'user_id', 'username', 'password', 'password_confirmation', 'email', 'first_name', 'last_name'
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
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
	public function __invoke($requestData)
	{
		// Process Domain Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		// Verify that the data has been sanitized and validated.
		if($actionDataPayload->getStatus() != 'valid')
		{
			return $actionDataPayload;
		}

		// @todo: Refactor this logic out of this class.

		// Get and ensure the model exists.
		$userPayload = User::get([['field' => 'id', 'value' => $actionDataPayload->getData()['user_id'], 'operator' => '=', 'or' => false]]);

		if($userPayload->getStatus() != 'found')
		{
			return $userPayload;
		}

		// Set the execute data.
		$executeData          = [];
		$executeData['model'] = $userPayload->getData()->first();
		$executeData['input'] = $actionDataPayload->getData();

		// Execute the action.
		return $this->execute($executeData);
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		return User::update($data['input'], $data['model']);
	}
}