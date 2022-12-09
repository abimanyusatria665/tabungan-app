<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function inputRegister(Request $request){

        $request->validate([
            'name'=> 'required|min:5',
            'email' => 'required|email:dnsx',
            'password' => 'required'
        ]);
        
        User::create->all();
        return redirect('/dashboard')->with('successRegister', 'Successfully Creating Account');

    }
    public function register(){
        return view('Dashboard.register');
    }
}
