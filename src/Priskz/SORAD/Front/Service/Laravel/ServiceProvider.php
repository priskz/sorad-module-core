<?php namespace Priskz\SORAD\Front\Service\Laravel;

use Priskz\SORAD\Front\API\Laravel\Routes;
use Priskz\SORAD\ServiceProvider\Laravel\AbstractRootServiceProvider as RootServiceProvider;

class ServiceProvider extends RootServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'front-root';

    /**
     * @property array $aggregates
     */
	protected $aggregates = [];

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Load Module Configurations
	    $this->publishes([
	    	realpath(__DIR__ . '/../..') . '/config/Laravel/front.php' => config_path('sorad/front.php'),
	    	realpath(__DIR__ . '/../..') . '/views' => resource_path('views/vendor/priskz'),
	    ]);

	    // Load Module Migrations
	    $this->loadMigrationsFrom(realpath(__DIR__ . '/../..') . '/migrations/Laravel');


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
		// NA
	}
}