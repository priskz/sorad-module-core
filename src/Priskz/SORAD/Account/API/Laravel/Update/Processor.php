<?php namespace Priskz\SORAD\Account\API\Laravel\Update;

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
	public function process(array $data, array $dataKeys, array $rules)
	{
		// Intersect the data given the with the data keys provided.
		$specifiedData = array_intersect_key($data, array_flip($dataKeys));

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
		$this->errorPayload = $this->validator->validate($specifiedData, $rules);

		// Return sanitized data if no validation errors exist.
		if($this->errorPayload->getStatus() == 'valid')
		{
			// Hash password if present.
			if(array_key_exists('password', $specifiedData))
			{
				$specifiedData['password'] = Hash::make($specifiedData['password']);
			}

			return new Payload($specifiedData, 'valid');
		}

		return $this->errorPayload;
	}

}