<?php

namespace App\Http\Controllers\UserDashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterValidatorRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('users-dashboard.auth.register');
    }

    public function doRegister(RegisterValidatorRequest $request)
    {
        $data = $request->except(['_method', '_token']);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('user.index')->with('success', 'Welcome Dear, ' . $user->name);
    }


}
