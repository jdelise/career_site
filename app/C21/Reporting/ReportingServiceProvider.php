<?php namespace App\C21\Reporting;

use Illuminate\Support\ServiceProvider;

class ReportingServiceProvider extends ServiceProvider {

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
            'App\C21\Reporting\ReportingInterface',
            'App\C21\Reporting\Repo\ReportingRepo'
        );
	}

}
