<?php namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CanText {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!Auth::user()->can('can_send_text')){
            return response('Unauthorized.', 401);
        }
		return $next($request);
	}

}
