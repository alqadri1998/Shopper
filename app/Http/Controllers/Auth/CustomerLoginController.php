<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm(){

        return view('website.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me'=>'string|in:on'
        ]);
        $rememberMe = $request->remember_me == 'on' ? true : false;



        $credentials = [
        'email' => $request->get('email'),
        'password' => $request->get('password')
    ];


        if (Auth::guard('customer')->attempt($credentials, $rememberMe)) {


            switch (Auth::guard('customer')->user()->status) {
                case "Active":
                    return redirect()->route('auth.customer.dashboard');
                    break;

                case "Blocked":
                    //Design a page for blocked!
                    break;
            }
        } else {
            return redirect()->route('customer.auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
//        $request->session()->invalidate();
        return redirect()->route('home.slider');
    }
}

