<?php

namespace App\Http\Controllers\UserDashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('users-dashboard.auth.login');
    }

    public function doLogin(LoginValidator $request)
    {
        if(auth()->attempt($request->except(['_method', '_token']))) {
            return redirect()->route('user.index');
        }

        return back()->with('error', 'Email Or Password Not Correct');
    }
}
