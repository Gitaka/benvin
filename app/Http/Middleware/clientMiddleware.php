<?php namespace App\Http\Middleware;

use Closure;
use Response;
use Illuminate\Support\Facades\Auth;
class clientMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::user()->AccessLevel > 0){
			return Response::View('errors.401');
		}
		return $next($request);
	}

}
