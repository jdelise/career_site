<?php namespace App\C21\Messaging;

use Illuminate\Support\ServiceProvider;

class MessagingServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
            'App\C21\Messaging\Repo\TextMessagingInterface',
            'App\C21\Messaging\Repo\TwilioRepo'
        );
	}

}
