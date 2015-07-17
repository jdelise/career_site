<?php namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CanAccessReporting {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!Auth::user()->can('can_access_reporting')){
            return response('Unauthorized', 401);
        }
		return $next($request);
	}

}
