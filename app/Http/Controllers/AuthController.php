<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $request['name'] = $request['f-name'] . " " . $request['l-name'];
        $user = User::create($request->all());
        Auth::login($user);
        Session::put('user',$user);
        return redirect()->route('dashboard');
    }

    public function login(LoginRequest $request){
        // dd($request->all());
        $credentials = request()->only('email', 'password'); // فقط فیلدهای ضروری را بگیر
        if(Auth::attempt($credentials)){
        Session::put('user',Auth::user());
            return redirect()->route('dashboard');
        }
        else{
            return back()->withErrors(['Nomach'=>'گذرواژه یا ایمیل صحیح نمیباشند']);
        }        
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Session::forget('user');
        return redirect()->back();
    }
}
