<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Country;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use View;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

        View::composer('auth.register', function($view) {
            $view->with('countries', Country::all());
        });
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:191|unique:users',
            'email' => 'required|email|max:191|unique:users',
            'country' => 'max:2',
            'accept' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if (isset($data['country'])) {
            $country = Country::where('code', $data['country'])->first();

            $user->country()->associate($country);
            $user->save();
        }

        return $user;
    }

    // code borrowed from:
    // https://laracasts.com/discuss/channels/requests/laravel-5-middleware-login-with-username-or-email?page=1

    protected function getCredentials(Request $request)
    {
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('username')]);
        return $request->only($field, 'password');
    }

    public function loginUsername()
    {
        return 'username';
    }
}
