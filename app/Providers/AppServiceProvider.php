<?php namespace App\Providers;

use App\Task;
use App\TaskName;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use League\Glide\ServerFactory;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

            $url = explode('.', Request::server('HTTP_HOST'));
            $subdomain = $url[0];
            Session::put('sub',$subdomain);

        view()->composer(['admin.parts.header','admin.partials.models.add_task'], function($view){
            $view->with('user', Auth::user())->with('task_names', TaskName::groupBy('task_name')->get());
        });
        view()->composer('admin.parts.user_notifications',function($view){
            $view->with('userTasks', Task::userAllNonCompletedTasks());
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
        $this->app->singleton('League\Glide\Server',function($app){
            $filesystem = $app->make('Illuminate\Contracts\Filesystem\Filesystem');
            return ServerFactory::create([
                'source' => $filesystem->getDriver(),
                'cache' => $filesystem->getDriver(),
                'source_path_prefix' => 'images',
                'cache_path_prefix' => 'images/.cache',
                'base_url' => 'img'
            ]);
        });
	}

}
