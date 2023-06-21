<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function login_process(Request $request) {
        $request->validate([
            'email' => ['required',],
            'password' => ['required'],
        ]);

        if(Auth::attempt($request->except('_token'))) {
            return redirect()->route('admin.subjects');
        } else {
            return back()->with(['failure' => 'Invalid combination!']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login')->with(['success' => 'Successfully logged out!']);
    }
}
