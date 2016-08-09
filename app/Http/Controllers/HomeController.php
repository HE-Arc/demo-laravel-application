<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('home', $request->route()->parameters()));
        }

        $users = User::all();
        return view('index', compact('users'));
    }

    public function home()
    {
        return view('home.home');
    }

    public function changeEmail(Request $request)
    {
        $user = $request->user();
        $email = $request->input('email');

        if ($email != $user->email) {
            // Warning: Read-and-Write potential conflict.
            $this->validate($request, [
                'email' => 'required|email|max:191|unique:users'
            ]);

            $user->email = $email;
            $user->save();
        }

        return redirect(route('home', $request->route()->parameters()));
    }
}
