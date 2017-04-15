<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request as LaravelRequest;
use SEOMeta;
use OpenGraph;
use Twitter;
use Setting;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$appname = Setting::get('app.title');
		SEOMeta::setTitle(Setting::get('app.name') . ' - Sign In');
		SEOMeta::setDescription("Please sign in to " . $appname . " to read thousand of manga in many category and tags.");
		SEOMeta::addKeyword(Setting::get('app.keyword'));
		SEOMeta::addMeta('robots', 'index,follow');

		$this->middleware('guest', ['except' => 'logout']);
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		if (LaravelRequest::has('email'))
			return 'email';

		return filter_var(LaravelRequest::input('login'), FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 */
	public function validateLogin(Request $request)
	{
		$this->validate($request, [
			'login' => 'required', 'password' => 'required',
		]);
	}

	/**
	 * Convert request login key to 'username' or 'email'
	 *
	 * @param \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Request
	 */
	public function mutateRequest(Request $request)
	{
		$login_type = $this->username();

		$request->merge([
			$login_type => $request->input('login')
		]);

		$request->offsetUnset('login');

		return $request;
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);

		$request = $this->mutateRequest($request);

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {
			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	protected function credentials(Request $request)
	{
		return $request->only($this->username(), 'password');
	}
}
