<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class userController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function register(Request $request){
        $form = $request->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'password'=>'required|confirmed|min:6'
        ]);
            $form['password']=bcrypt($form['password']);
            $user= User::create($form);
            auth()->login($user);
            return redirect('/');

    }


    public function userLogin(Request $request){
        $form = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($form)){
            $request-> session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');

    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

