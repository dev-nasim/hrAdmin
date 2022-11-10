<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function submitLogin(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginData = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($loginData)){
            return redirect('dashboard');
        }else{
            return redirect('login')->withErrors(['message' => 'Can not find users with provided credential']);
        }
    }

    public function logout(){

        Auth::logout();

        return redirect('login');
    }
}
