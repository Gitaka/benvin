<?php namespace App\Http\Middleware;

use Closure;
use Response;
use Illuminate\Support\Facades\Auth;
class managerMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::user()->AccessLevel != 2){
			return Response::View('errors.503');
		}
		return $next($request);
	}

}
