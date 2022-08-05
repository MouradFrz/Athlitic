<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{   public function welcome(){
    return view('welcome',[
        'collections'=>Collection::where('featured','!=',0)->get(),
        'products'=>Product::where('featured','!=',0)->get()
    ]);
}
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

    public function shop(Request $request){
        $gen = false;
        if(($request->Men) || ($request->Women) ||($request->Kids)){
            $gen = true;
        }
        $array = [($request->Men)?'Men':'',($request->Women?'Women':''),($request->Kids)?'Kids':''];
        $products = Product::where('name','LIKE',($request->keyword) ? '%'.$request->keyword.'%' : '%')
        ->whereIN('for',($gen)?$array:['Men','Women','Kids'])
        // ->where('collection',($request->collection) ? $request->collection : null )
        // ->orWhere('collection','LIKE',($request->collection) ? $request->collection : '%' )
        ->where(function($query) use ($request){
            $query->where('collection',($request->collection) ? $request->collection : null )
            ->orWhere('collection','LIKE',($request->collection) ? $request->collection : '%' );
        })
        ->where('price','>=',($request->minprice) ? $request->minprice : 0 )
        ->where('price','<=',($request->maxprice) ? $request->maxprice : 9999999999 )
        ->where('promo','!=',($request->onsale) ? 0 : -1 )
        ->paginate(12)->appends(request()->query());;



    
        return view('user.products',[
            'products'=>$products,
            'collections'=>Collection::all()
        ]);
    }
}
