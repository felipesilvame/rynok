<?php

namespace App\Providers;

use Auth;
use App\Auth\CustomUserProvider;
use Illuminate\Support\ServiceProvider;

class CustomAuthServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

	    Auth::provider('custom',function($app, array $config)
	    {

	        return new CustomUserProvider();
	    });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	    //
	}
}