<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;

class AddHeaderMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$response = $next($request);

		$response->setLastModified(new DateTime("now"));
		$response->setExpires(new DateTime("tomorrow"));

		return $response;
	}
}
