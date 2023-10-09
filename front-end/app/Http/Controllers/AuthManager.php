<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'Username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('Username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('map'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    public function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'Username' => 'required',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['Username'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }
        return redirect(route('login'))->with("Success", "Registration Success. Login to access the app");
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    
}
