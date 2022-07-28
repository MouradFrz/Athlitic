<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function LoginPage(){
        return view('admin.login');
    }

    public function check(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $cred = $request->only('username','password');
        // dd($cred);
        if(Auth::guard('admin')->attempt($cred,1)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error',"Incorrect credentials.");
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }
    public function DashboardPage(){
        return view('admin.dashboard');
    }
}
