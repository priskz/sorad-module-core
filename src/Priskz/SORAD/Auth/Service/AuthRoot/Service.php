<?php namespace Priskz\SORAD\Auth\Service\AuthRoot;

use Priskz\SORAD\Service\Laravel\GenericCrudService;

class Service extends GenericCrudService
{
    /**
     * @property array $configuration
     */
	protected $configuration = [
		'REGISTER' => [
			'keys'     => [
				'username', 'password', 'email', 'first_name', 'last_name', 'remember_token',
			],
			'rules'    => [
				'username'        =>  'required',
				'email'           =>  'required|email',
				'first_name'      =>  'required',
				'last_name'       =>  'required',
				'password'        =>  'required',
				'remember_token'  =>  '',
				'context' => [
					'unique_username',
					'unique_email',
				]
			],
			'defaults' => []
		],
	];

	/**
	 *	Constructor
	 */
	public function __construct($alias, $processor, $aggregate)
	{
		parent::__construct($alias, $processor);
		$this->dataSource = $aggregate['user'];		
	}

	/**
	 * Register a new User.
	 *
	 * @param  array  $data
	 * @return Payload
	 */
	public function register($data)
	{
		// Process data given.
		$processPayload = $this->process(__FUNCTION__, $data);

		if($processPayload->getStatus() != 'valid')
		{
			return $processPayload;
		}

		return $this->dataSource->create($processPayload->getData());
	}
}