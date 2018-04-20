<?php namespace Priskz\SORAD\Admin\Service\Laravel;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use Priskz\SORAD\Admin\Service\Laravel\ServiceProvider;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
    	return ServiceProvider::getProviderKey();
    }
}