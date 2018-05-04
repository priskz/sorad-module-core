<?php

namespace Priskz\SORAD\Front\API\Laravel;

use Illuminate\Support\Facades\Route;
use Priskz\SORAD\Routes\Laravel\AbstractRoutes;

class Routes extends AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix     = '/';

    /**
     * @property array $middleware
     */
	protected static $middleware = ['web'];

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
			// Show Home
			Route::get('/', 'ShowHome')->name('front.home');
		});
	}
}