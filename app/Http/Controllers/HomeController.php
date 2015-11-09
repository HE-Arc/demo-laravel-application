<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use View;


class HomeController extends Controller
{
    public function getIndex() {
        if (Auth::check()) {
            return redirect(route('home', ['lang' => Request::route()->parameter('lang')]));
        }
        return View::make('home.index', ['users' => User::all()]);
    }

    public function getHome() {
        return View::make('home.home');
    }

    public function postHome(Request $request) {

        $user = $request->user();
        $email = $request->input('email');

        if ($email !== $user->email) {
            // Automagically
            $this->validate($request, [
                "email" => "required|email|max:191|unique:users"
            ]);
            // vs Manually
            /*
            use Validator;

            $validator = Validator::make(compact('email'), [
                "email" => "required|email|max:191|unique:users",
            ]);

            if ($validator->fails()) {
                return Redirect::to("home")->withInput()->withErrors($validator);
            }
            */

            $user->email = $email;
            $user->save();
        }

        return Redirect::to("home");
    }
}
