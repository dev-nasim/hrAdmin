<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

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

    //    API

    public function apiLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginData = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($loginData)){
            $user = auth()->user();
            $user->token = $user->createToken('Laravel')->accessToken;
            return $user;
        }else{
            return response()->json(['message' => 'Can not find users with provided credential'],Response::HTTP_UNAUTHORIZED);
//            return redirect('login')->withErrors(['message' => 'Can not find users with provided credential']);
        }
    }
}
