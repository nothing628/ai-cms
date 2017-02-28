<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use DateInterval;

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
		$days2 = new DateInterval("P2D");
		$expire = new DateTime();
		$expire->add($days2);
		$max_age = $days2->d * 60 * 60 * 24;
		$response = $next($request);

		$response->headers->set('X-XSS-Protection', '1; mode=block');
		$response->headers->set('Cache-Control', 'max-age=' . $max_age);
		$response->setLastModified(new DateTime("now"));
		$response->setExpires($expire);

		return $response;
	}
}
