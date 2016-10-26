<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // code borrowed from:
    // https://laracasts.com/discuss/channels/requests/laravel-5-middleware-login-with-username-or-email?page=1
    public function username()
    {
        return 'name';
    }

    protected function credentials(Request $request)
    {
        $username = $this->username();
        $field = filter_var($request->input($username), FILTER_VALIDATE_EMAIL) ? 'email' : $username;
        $request->merge([$field => $request->input($username)]);
        return $request->only($field, 'password');
    }
}
