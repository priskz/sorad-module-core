<?php namespace Service\User;

use Priskz\SORAD\Service\Laravel\GenericCrudService;

class Service extends GenericCrudService
{
	/**
	 *  Persitence Configuration
	 */
	protected $configuration = [
		'CREATE' => [
			'keys'     => [
				'username', 'password', 'email', 'first_name', 'last_name', 'remember_token',
			],
			'rules'    => [
				'username'        =>  '',
				'email'           =>  '',
				'first_name'      =>  '',
				'last_name'       =>  '',
				'password'        =>  '',
				'remember_token'  =>  '',
				'context' => []
			],
			'defaults' => []
		],
		'UPDATE' => [
			'keys'     => [
				'username', 'password', 'email', 'first_name', 'last_name', 'remember_token',
			],
			'rules'    => [
				'username'   	  =>  '',
				'email'           =>  '',
				'first_name'      =>  '',
				'last_name'       =>  '',
				'password'        =>  '',
				'remember_token'  =>  '',
				'context' => []
			],
			'defaults' => []
		],
		'DELETE' => [
			'keys'     => [],
			'rules'    => [],
			'defaults' => []
		],
	];

	/**
	 *	Constructor
	 */
	public function __construct($dataSource)
	{
		parent::__construct();
		$this->dataSource = $dataSource;
	}
}