<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('cms.auth.login');
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


        if (Auth::guard('admin')->attempt($credentials, $rememberMe)) {

            switch (Auth::guard('admin')->user()->status) {
                case "Active":
                    return redirect()->route('admin.dashboard');
                    break;

                case "Blocked":
                    //Design a page for blocked!
                    break;
            }
        } else {
            return redirect()->route('admin.auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
//        $request->session()->invalidate();
        return redirect()->route('admin.auth.login');
    }
}
