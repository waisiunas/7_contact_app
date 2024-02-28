<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except('_token'))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with(['failure' => 'Invalid login details!']);
        }
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:2', 'max:255', 'confirmed'],
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with(['success' => 'Successfully logged out!']);
    }
}
