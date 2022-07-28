<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function LoginPage(){
        return view('user.login');
    }
    public function RegisterPage(){
        return view('user.register');
    }
    public function create(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'phonenumber' => ['digits:10', 'regex:/(05|06|07)[0-9]{8}/','unique:users,phonenumber'],
            'password'=>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'passwordConfirm'=>'required|same:password',
        ]);
        $user = new User();
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('user.login')->with('message','Account created succesfully.');
    }
    public function check(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $cred = $request->only('email','password');
        // dd($cred);
        if(Auth::guard('web')->attempt($cred,1)){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('error',"Incorrect credentials.");
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}
