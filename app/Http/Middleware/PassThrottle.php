<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests;
use Route;
use Closure;

class PassThrottle extends ThrottleRequests
{
	/**
	 * The names of the cookies that should not be encrypted.
	 *
	 * @var array
	 */
	protected $except = [
		'api.upload.page'
	];

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  int  $maxAttempts
	 * @param  float|int  $decayMinutes
	 * @return mixed
	 */
	public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1)
	{
		$routename = $request->route()->getName();
		$routepath = $request->path();

		if (in_array($routepath, $this->except) || in_array($routename, $this->except)) {
			$key = $this->resolveRequestSignature($request);

			$this->cancelThrottle($key);
		}

		return parent::handle($request, $next, $maxAttempts, $decayMinutes);
	}

	public function cancelThrottle($key)
	{
		$this->limiter->clear($key);
	}
}
