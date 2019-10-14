<?php

namespace Priskz\SORAD\Auth\Service\AuthRoot\Processor;

use Hash;
use Priskz\Payload\Payload;
use Priskz\SORAD\Service\Processor\Laravel\Processor as LaravelProcessor;

class Standard extends LaravelProcessor
{
	/**
	 * Service
	 */
	protected $service;

	/**
	 * Construct
	 *
	 * @param  array  $service
	 */
	public function __construct($service)
	{
		parent::__construct();

		// Set the given services available for use to validate context.
		$this->service = $service;
	}

	/**
	 * @OVERRIDE
	 *
	 * Process the given data against the given rules and useable data keys.
	 *
	 * @param  array  $data
	 * @param  array  $keys
	 * @param  array  $rules
	 * @param  array  $defaults
	 *
	 * @return Payload\Payload
	 */
	public function process($data, $keys, $rules, $defaults = null)
	{
		// Set any configured default data values.
		$processData = $this->processDefaults($data, $defaults);

		//  Validate data based on the given context of the data.
		$validateContextPayload = $this->validateContext($processData, $rules);

		// Return sanitized data if no validation errors exist.
		if( ! $validateContextPayload->isStatus(Payload::STATUS_VALID))
		{
			return $validateContextPayload;
		}

		// Extract only the data that we want to validate.
		$processData = array_intersect_key($processData + $validateContextPayload->getData(), array_flip($keys));

		// Validate the given data.
		$validatorPayload = $this->validator->validate($processData, $rules, $this->messages);

		// Check if data is valid.
		if($validatorPayload->getStatus() != 'valid')
		{
			return $validatorPayload;
		}

		// Hash the password before saving if it is not empty, otherwise unset it as it is not needed.
		if( ! empty($validatorPayload->getData()['password']))
		{
			$processData['password'] = Hash::make($validatorPayload->getData()['password']);
		}
		else
		{
			unset($processData['password']);
		}

		return new Payload($processData, 'valid');
	}

	/**
	 *  Context Validation
	 */
	public function validateContext($data, $rules)
	{
		// Start off with a valid status.
		$status = 'valid';

		// We only need to validate context if context rules are given.
		if(array_key_exists('context', $rules))
		{
			foreach($rules['context'] as $rule)
			{
				switch($rule)
				{
					case 'unique_email':
						$userPayload = $this->service['user']->get([['field' => 'email', 'value' => $data['email'], 'operator' => '=', 'or' => false]]);

						if($userPayload->getStatus() == 'found')
						{
							if(in_array($data['email'], $userPayload->getData()->pluck('email')->toArray()))
							{
								$status = $rule;
							}
						}
					break;

					case 'unique_username':
						$userPayload = $this->service['user']->get([['field' => 'username', 'value' => $data['username'], 'operator' => '=', 'or' => false]]);

						if($userPayload->getStatus() == 'found')
						{
							if(in_array($data['username'], $userPayload->getData()->pluck('username')->toArray()))
							{
								$status = $rule;
							}
						}
					break;

					default:
					break;
				}
			}
		}

		// @todo: check if we need to unset this.
		// Remove context rules as they're no longer needed.
		unset($rules['context']);

		return new Payload($data, $status);
	}
}