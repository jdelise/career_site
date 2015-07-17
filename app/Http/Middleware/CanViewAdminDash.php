<?php namespace App\Http\Middleware;

use Closure;

class CanViewAdminDash {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!Auth::user()->can('can_view_dashboard')){
            return response('Unauthorized.', 401);
        }
		return $next($request);
	}

}
