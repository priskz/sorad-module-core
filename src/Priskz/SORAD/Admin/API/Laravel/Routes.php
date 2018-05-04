<?php

namespace Priskz\SORAD\Admin\API\Laravel;

use Illuminate\Support\Facades\Route;
use Priskz\SORAD\Routes\Laravel\AbstractRoutes;

class Routes extends AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix     = 'admin';

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
			// View Admin Overview.
			Route::get('/', 'ShowOverview\Responder')->name('admin.overview');
		});
	}
}