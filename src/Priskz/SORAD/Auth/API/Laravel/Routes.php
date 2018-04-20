<?php namespace Priskz\SORAD\Auth\API\Laravel;

use Illuminate\Support\Facades\Route;
use Priskz\SORAD\Routes\Laravel\AbstractRoutes;

class Routes extends AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix     = 'auth';

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
			Route::get('register','ShowRegister')->name('auth.register');

			Route::post('register', 'Register')->name('auth.register');

			Route::get('password-forgot', 'ShowForgotPassword')->name('auth.password.forgot');

			Route::post('password-forgot', 'ForgotPassword')->name('auth.password.forgot.submit');

			Route::get('password-reset/{token}', 'ShowResetPassword')->name('password.reset');

			Route::post('password-reset/{token}', 'ResetPassword')->name('auth.password.reset');

			Route::get('login', 'ShowLogin')->name('auth.login');

			Route::post('login', 'Login')->name('auth.login');

			Route::get('logout', 'Logout')->name('auth.logout');
		});
	}
}