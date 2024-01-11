<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    /*   public function auth_login(Request $request)
    {


        $remember = !empty($request->remember) ? true : false;

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',


        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ], $remember)) {
            flash()->addSuccess('Login successful!');
            return  redirect('/panel/dashboard');
        }
        else {
            return redirect('login')->with('info', "Make sure that you are entering your email address and password correctly.");
        }



    } */

    public function auth_login(Request $request)
    {

        /* dd($request->all()); */
        $remember = !empty($request->remember) ? true : false;

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',

        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 0  ], $remember)) {

            flash()->addSuccess('Login successful!');
            return  redirect('/panel/dashboard');
        } elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1 ])){
            flash()->addSuccess('Login successful!');
            return  redirect('/');
        }


        else {
            return redirect('login')->with('info', "Make sure that you are entering your email address and password correctly.");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
