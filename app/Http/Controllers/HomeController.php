<?php

namespace App\Http\Controllers;

use View;
use Redirect;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex() {
        if (Auth::check()) {
            return Redirect::to("home");
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
