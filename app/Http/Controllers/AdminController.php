<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as File;

class AdminController extends Controller
{
    public function LoginPage()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $cred = $request->only('username', 'password');
        // dd($cred);
        if (Auth::guard('admin')->attempt($cred, 1)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', "Incorrect credentials.");
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }
    public function DashboardPage()
    {
        return view('admin.dashboard');
    }
    public function ProductsManagementPage()
    {

        return view('admin.ProductManagement', ['products' => Product::all(), 'collections' => Collection::all()]);
    }
    public function AddProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'image' => 'required',
            'category' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'for' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'collection' => 'max:45',
            'price' => 'required|numeric'
        ]);

        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img\products'), $newImageName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->for = $request->for;
        $product->price = $request->price;
        $product->image = $newImageName;
        $product->collection = $request->collection;

        $product->save();
        return redirect()->back()->with('success', 'Product added succesfully');
    }

    public function ProductPage($id)
    {
        $product = Product::find($id);
        if ($product) {
            $collections = Collection::all();
            return view('admin.ProductDetails', ['product' => $product, 'collections' => $collections]);
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function EditProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'sale' => 'max:100|numeric|nullable',
            'category' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'for' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'collection' => 'max:45|nullable',
            'price' => 'required|numeric'
        ]);

        // dd($request->category);

        $product = Product::find($id);
        if ($product) {


            $product->name = $request->name;
            $product->description = $request->description;
            $product->category = $request->category;
            $product->for = $request->for;
            $product->collection = $request->collection;
            $product->price = $request->price;
            $product->promo = $request->sale;

            if ($request->image) {
                try {
                    File::delete(public_path("img/products/{$product->image}"));
                    $imageName = explode('.', $product->image)[0] . '.' . $request->image->extension();
                    Product::where('id', $id)->update(['image' => $imageName]);
                    $request->image->move(public_path('img\products'), $imageName);
                } catch (Exception $e) {
                    return redirect()->back()->with('success', 'Something went wrong!');
                }
            }
            $product->save();
            return redirect()->back()->with('success', 'Product successfully edited!');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function DeleteProduct($id)
    {

        $product = Product::find($id);
        if ($product) {
            File::delete(public_path("img/products/{$product->image}"));
            $product->delete();
            return redirect()->route('admin.ProductsManagement')->with('success', 'Product deleted!');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function CollectionManagement()
    {
        return view('admin.CollectionManagement', ['collections' => Collection::all()]);
    }

    public function AddCollection(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'image' => 'required',
        ]);
        try {

            $collectionImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/collections'), $collectionImageName);

            $collection = new Collection();
            $collection->name = $request->name;
            $collection->description = $request->description;
            $collection->image = $collectionImageName;
            $collection->created_at = now();
            $collection->save();
        } catch (Exception $e) {
            dd($e);
        }


        return redirect()->back()->with('success', 'Collection created successfully.');
    }
    public function CollectionDetails($id)
    {
        $collection = Collection::find($id);
        $products = Product::where('collection', $id)->get();
        if ($collection) {
            return view('admin.CollectionDetails', ['collection' => $collection, 'products' => $products]);
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function EditCollection(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:45',
            'description' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:10000',
            'id' => 'required|exists:collections,id'
        ]);

        $collection = Collection::find($request->id);



        $collection->name = $request->name;
        $collection->description = $request->description;


        if ($request->image) {
            try {
                File::delete(public_path("img/collections/{$collection->image}"));
                $imageName = explode('.', $collection->image)[0] . '.' . $request->image->extension();
                Collection::where('id', $request->id)->update(['image' => $imageName]);
                $request->image->move(public_path('img\collections'), $imageName);
            } catch (Exception $e) {
                echo $e;
                return redirect()->back()->with('success', 'Something went wrong!');
            }
        }
        $collection->save();
        return redirect()->back()->with('success', 'Collection successfully edited!');
    }
    public function StockManagement()
    {

        $stocks = Stock::join('products', 'stocks.product', '=', 'products.id')->select(['stocks.id', 'initialcount', 'currentcount', 'size', 'stocks.created_at', 'name', 'image'])->orderBy('currentcount', 'DESC')->get();
        return view('admin.StockManagement', ['stocks' => $stocks, 'products' => Product::all()]);
    }
    public function AddStock(Request $request)
    {
        $request->validate([
            'product' => 'required|numeric|exists:products,id',
            'quantity' => 'required|numeric|max:9999',
            'size' => 'alpha|max:3|required'
        ]);

        $stock = new Stock();
        $stock->product = $request->product;
        $stock->size = $request->size;
        $stock->initialcount = $request->quantity;
        $stock->currentcount = $request->quantity;
        $stock->save();

        return redirect()->back()->with('success', 'Stock added successfully!');
    }
    public function LoadOrders()
    {

        $orders = Order::join('users', 'user_id', '=', 'users.id')->orderBy('orders.created_at')->get(['email', 'total', 'orders.created_at', 'state', 'orders.id']);
        return view('admin.Orders', ['orders' => $orders]);
    }
    public function EditOrderState(Order $order)
    {
        $order->update(['state' => 'delivered']);
        return $order;
    }
    public function HomepageManagement()
    {
        return view('admin.HomepageManagement', ['featured' => Collection::where('featured', '!=', '0')->get(), 'collections' => Collection::all()]);
    }
    public function EditSlotValue(Request $request)
    {
        $collection = Collection::where('featured', $request->slot)->first();
        if ($collection) {
            $collection->featured = 0;
            $collection->save();
        }
        $newCollection = Collection::where('id',$request->collection)->first();
        if($newCollection){
            $newCollection->featured = $request->slot;
            $newCollection->save();
        }
        
      
        return to_route('admin.HomepageManagement')->with('success','Slot edited succesfully');
    }
}
