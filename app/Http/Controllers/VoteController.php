<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Redirect;
use Faker\Factory;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function getIndex() {
        if (!Auth::check()) {
            // No users, let's create one.
            $factory = Factory::create();
            $created = false;
            do {
                //try {
                    $user = User::create([
                        "username" => $factory->userName,
                        "email" => $factory->email,
                        "password" => $factory->password
                    ]);
                //} catch () {
                    // TODO
                //}
                $created = true;

            } while (!$created);

            // Login this user and remember.
            Auth::login($user, true);
        }

        return view('vote.index', ["title" => "Vote"]);
    }

    public function postIndex(Request $request) {
        // Save the vote.
        return Redirect::to(route('vote', $request->route()->parameters()));
    }
}
