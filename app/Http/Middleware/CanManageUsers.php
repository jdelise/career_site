<?php namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CanManageUsers {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!Auth::user()->can('can_manage_users')){
            return response('Unauthorized', 401);
        }
        return $next($request);
	}

}
