<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Redirect to the intended page or home if none
            return redirect()->intended('home');
        }

        // If not authenticated, show the login form
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Attempt login using provided credentials
        if (Auth::attempt($data)) {
            // Redirect to the intended page or home
            return redirect()->intended('home');
        } else {
            // Flash the error message and redirect back to the login page
            return redirect('/dashboard')->withErrors(['email' => 'Email or Password is incorrect']);
        }
    }

    public function actionlogout()
    {
        // Logout the user and redirect to the login page
        Auth::logout();
        return redirect('/');
    }
}
