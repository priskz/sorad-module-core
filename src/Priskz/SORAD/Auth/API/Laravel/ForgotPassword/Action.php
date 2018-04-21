<?php namespace Priskz\SORAD\Auth\API\Laravel\ForgotPassword;

use Auth;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	// Laravel Trait
	use ResetsPasswords;

	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'email',
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
		'email'    => 'required',
	];

	/**
	 *	Constructor
	 */
	public function __construct(PasswordBroker $passwords)
	{
		parent::__construct();
		$this->passwords = $passwords;
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
		$response = $this->passwords->sendResetLink($data, function($email)
		{
			$email->subject('Password Reset');
		});

		return new Payload(null, $response);
	}
}