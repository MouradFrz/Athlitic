<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');


 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//TO MAKE A ROUTE REQUIRE THE EMAIL TO BE VERIFIED WE ADD 'verified' Middleware

Route::middleware(['PreventBackHistory'])->get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::get('login',[UserController::class,'LoginPage'])->name('login');
        Route::get('register',[UserController::class,'RegisterPage'])->name('register');
        Route::post('create',[UserController::class,'create'])->name('create');
        Route::post('check',[UserController::class,'check'])->name('check');
    });
    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('logout',[UserController::class,'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::get('login',[AdminController::class,'LoginPage'])->name('login');
        Route::post('check',[AdminController::class,'check'])->name('check');
    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('logout',[AdminController::class,'logout'])->name('logout');
        Route::get('dashboard',[AdminController::class,'DashboardPage'])->name('dashboard');
        Route::get('products-management',[AdminController::class,'ProductsManagementPage'])->name('ProductsManagement');
        Route::post('add-product',[AdminController::class,'AddProduct'])->name('AddProduct');
        Route::get('product-details/{id}',[AdminController::class,'ProductPage'])->name('ProductDetails');
        Route::post('edit-product/{id}',[AdminController::class,'EditProduct'])->name('EditProduct');
        Route::post('delete-product/{id}',[AdminController::class,'DeleteProduct'])->name('DeleteProduct');
    });
});