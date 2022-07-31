<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as File;

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
    public function ProductsManagementPage(){

        return view('admin.ProductManagement')->with('products',Product::all());
    }
    public function AddProduct(Request $request){
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'image'=>'required',
            'category'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'for'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'collection'=>'max:45',
            'price'=>'required|numeric'
        ]);

        $newImageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img\products'), $newImageName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category=$request->category;
        $product->for=$request->for;
        $product->price=$request->price;
        $product->image = $newImageName;
        $product->collection=$request->collection;

        $product->save();
        return redirect()->back()->with('success','Product added succesfully');
    }

    public function ProductPage($id){
        return view('admin.ProductDetails',['product'=>Product::find($id)]);
    }
    public function EditProduct(Request $request,$id){
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'sale'=>'max:100|numeric|nullable',
            'category'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'for'=>'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'collection'=>'max:45|nullable',
            'price'=>'required|numeric'
        ]);

        // dd($request->category);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->for = $request->for;
        $product->collection = $request->collection;
        $product->price = $request->price;
        $product->promo = $request->sale;

        if($request->image){
            try{
                File::delete(public_path("img/products/{$product->image}"));
                $imageName = explode('.',$product->image)[0].'.'.$request->image->extension();
                Product::where('id',$id)->update(['image'=>$imageName]);
                $request->image->move(public_path('img\products'), $imageName);
            }catch(Exception $e){
                return redirect()->back()->with('success','Something went wrong!');
            }

        }
    
    
        $product->save();
        return redirect()->back()->with('success','Product successfully edited!');
    }
    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        File::delete(public_path("img/products/{$product->image}"));
        $product->delete();
        return redirect()->route('admin.ProductsManagement')->with('success','Product deleted!');
    }
}
