<?php

namespace Service\User\Laravel;

use Priskz\SORAD\ServiceProvider\Laravel\AbstractServiceProvider as SORADServiceProvider;
use Domain\User\Data\MySQL\Eloquent\Model as Model;
use Domain\User\Repository\CRUD as DataSource;
use Service\User\Service;

class ServiceProvider extends SORADServiceProvider
{
	/**
	 * This provider's identifier key.
	 *
	 * @var string
	 */
	protected static $providerKey = 'user';

	/**
	 * Register Services.
	 *
	 * @return void
	 */
	protected function registerService()
	{
		$this->app->singleton($this->getProviderKey(), function($app)
		{
			return new Service(new DataSource(new Model([], $this->getConnection())));
		});
	}
}