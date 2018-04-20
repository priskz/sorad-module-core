<?php namespace Priskz\SORAD\Account\API\Laravel;

use Illuminate\Support\Facades\Route;
use Priskz\SORAD\Routes\Laravel\AbstractRoutes;

class Routes extends AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix     = 'account';

    /**
     * @property array $middleware
     */
	protected static $middleware = ['web', 'auth'];

    /**
     * @property array $nameSpace
     */
	protected static $namespace  = __NAMESPACE__;

    /**
     * Register the route group.
     * 
     * @return void
     */
	protected static function register()
	{
		Route::group(['prefix' => static::$prefix, 'middleware' => static::$middleware, 'namespace' => static::$namespace], function()
		{
			// Show User account overview.
			Route::get('/', 'ShowOverview')->name('account.overview');

			// Show edit User account form.
			Route::get('edit', 'ShowEdit')->name('account.edit');

			// Update a User account.
			Route::put('edit', 'Update')->name('account.update');
		});
	}
}