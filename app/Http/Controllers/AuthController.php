<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('authentication.signup');
    }

    public function signup(Request $request)
    {


        $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Users::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            return back()->with('error', 'Something went wrong, please try again.');
        }


        return redirect('/login')->with('success', 'You Signup SUccessfully. Please Login.');
    }

    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        //with success authentication
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/index');
        }

        //with unsuccessfull authentication
        return back();
    }

    public function index()
    {
        return view('authentication.index');
    }

   
}
