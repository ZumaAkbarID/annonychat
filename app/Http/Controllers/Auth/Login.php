<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function form()
    {
        return view('Auth.login', [
            'title' => 'Login Bro'
        ]);
    }

    public function process(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->intended('/dashboard')->with('success', 'Selamat datang ganteng :)');
        } else {
            return redirect()->back()->with('error', 'Siapa Luwh??');
        }
    }
}