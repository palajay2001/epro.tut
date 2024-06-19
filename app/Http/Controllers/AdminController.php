<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function loginform(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        if (Auth::attempt($request->only('email', 'password'))){

            if (auth()->user()->is_admin) {
                return redirect()->intended('index');
            }else{
                return redirect()->intended('index');
            }
        }
        return back()->withErrors(['email'=>'Wrong email']);
    }

    public function signup(){
        return view('register');
    }
    public function signupUser(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:10',
            'c_password' => 'required|same:password',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::attempt($request->only(['email', 'password']));

        if($user){
            return back()->with('message','You have been already resister your account');
        }

        $data = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        if(!$data){
            return back()->with('message','Failed to resister.');
        }
        return redirect()->route('loginform');
    }
}
    