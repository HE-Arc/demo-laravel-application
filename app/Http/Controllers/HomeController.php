<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Redirect;
use App\User;


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
}
