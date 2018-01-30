<?php

namespace kanalumaddela\LaravelSteamLogin;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class SteamServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred
	 *
	 * @var boolean
	 */
	protected $defer = false;

	/**
	 * Bootstrap any application services
	 *
	 * @return void
	 */
	public function boot() {
		$this->publishes([__DIR__ . '/../config/steam-login.php' => config_path('steam-login.php')]);
	}

	/**
	 * Register bindings in the container
	 *
	 * @param Request $request
	 * @return void
	 */
	public function register(Request $request) {
		$this->app->singleton('steamlogin', function() use ($request) {
			return new SteamLogin($request);
		});
	}
}