<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }
    public function storeSignup(Request $request){
        request()->validate([
            'name'=> 'required',
            'email'=>'required|unique:users',
            'password'=> 'required|min:6'
        ]);

       User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
       ]);
       return redirect()->back()->with('success','Berhasil Disimpan');

    }

    public function signin(){
        return view('auth.signin');
    }

    public function storeSignin(Request $request){
        request()->validate([
            'email'=>'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->to('/')->with('success','Berhasil Login');
        }
        return redirect()->back()->withErrors([
        'name'=>'gagal Login'
        ])->withinput();
    }
}
