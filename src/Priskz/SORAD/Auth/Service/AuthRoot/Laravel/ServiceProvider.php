<?php

namespace Priskz\SORAD\Auth\Service\AuthRoot\Laravel;

use Priskz\SORAD\Auth\API\Laravel\Routes;
use Priskz\SORAD\Auth\Service\AuthRoot\Processor\Standard as Processor;
use Priskz\SORAD\Auth\Service\AuthRoot\Service;
use Priskz\SORAD\ServiceProvider\Laravel\AbstractRootServiceProvider as RootServiceProvider;

class ServiceProvider extends RootServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'auth-root';
	
    /**
     * @property array $aggregates
     */
	protected $aggregates = [
		'user',
	];

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Load Module Configurations
	    $this->publishes([
	    	realpath(__DIR__ . '/../../..') . '/config/Laravel/auth.php' => config_path('sorad/auth.php'),
	    	realpath(__DIR__ . '/../../..') . '/views' => resource_path('views/vendor/priskz'),
	    ]);

	    // Load Module Migrations
	    $this->loadMigrationsFrom(realpath(__DIR__ . '/../../..') . '/migrations/Laravel');

	    // Load Routes
	    Routes::load();
	}

	/**
	 * Register Services.
	 *
	 * @return void
	 */
	protected function registerService()
	{
	    $this->app->singleton($this->getProviderKey(), function($app)
	    {
	    	return new Service($this->getProviderKey(), new Processor($this->getAggregateService()), $this->getAggregateService());
	    });
	}
}