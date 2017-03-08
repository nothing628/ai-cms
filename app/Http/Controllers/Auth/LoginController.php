<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('guest', ['except' => 'logout']);
        $appname = Setting::get('app.title');
        SEOMeta::setTitle(Setting::get('app.name') . ' - Sign In');
        SEOMeta::setDescription("Please sign in to " . $appname . " to read thousand of manga in many category and tags.");
        SEOMeta::addKeyword(Setting::get('app.keyword'));
        SEOMeta::addMeta('robots', 'index,follow');
    }
}
