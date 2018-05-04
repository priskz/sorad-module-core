<?php

namespace Priskz\SORAD\Account\API\Laravel\Update;

use Hash;
use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Processor\Laravel\Processor as LaravelProcessor;

class Processor extends LaravelProcessor
{
	/**
	 * Process the given data against the given rules and useable data keys.
	 *
	 * @param  array  $data
	 * @param  array  $dataKeys
	 * @param  array  $rules
	 * @return Payload
	 */
	public function process(array $data, array $config)
	{
		// Intersect the data given the with the data keys provided.
		$specifiedData = array_intersect_key($data, array_flip(array_keys($config)));

		// Unset password if null, otherwise hash it for saving.
		if(array_key_exists('password', $specifiedData))
		{
			// Unset password rules if null.
			if(is_null($specifiedData['password']))
			{
				unset($rules['password']);
			}
		}

		// Validate and set our errors if they exist.
		$this->errorPayload = $this->validator->validate($specifiedData, $config);

		// Return sanitized data if no validation errors exist.
		if($this->errorPayload->getStatus() == Payload::STATUS_VALID)
		{
			// Hash password if present.
			if(array_key_exists('password', $specifiedData))
			{
				$specifiedData['password'] = Hash::make($specifiedData['password']);
			}

			return new Payload($specifiedData, Payload::STATUS_VALID);
		}

		return $this->errorPayload;
	}

}