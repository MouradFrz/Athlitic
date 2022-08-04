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

Route::middleware(['PreventBackHistory'])->get('/',[UserController::class,'welcome'])->name('home');


Route::prefix('user')->name('user.')->controller(UserController::class)->group(function(){
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::get('login','LoginPage')->name('login');
        Route::get('register','RegisterPage')->name('register');
        Route::post('create','create')->name('create');
        Route::post('check','check')->name('check');
    });
    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('logout','logout')->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::get('login','LoginPage')->name('login');
        Route::post('check','check')->name('check');
    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('logout','logout')->name('logout');
        Route::get('dashboard','DashboardPage')->name('dashboard');
        Route::get('products-management','ProductsManagementPage')->name('ProductsManagement');
        Route::post('add-product','AddProduct')->name('AddProduct');
        Route::get('product-details/{id}','ProductPage')->name('ProductDetails');
        Route::post('edit-product/{id}','EditProduct')->name('EditProduct');
        Route::post('delete-product/{id}','DeleteProduct')->name('DeleteProduct');
        Route::get('collection-management','CollectionManagement')->name('CollectionManagement');
        Route::get('collection-details/{id}','CollectionDetails')->name('CollectionDetails');
        Route::post('add-collection','AddCollection')->name('AddCollection');
        Route::post('edit-collection','EditCollection')->name('EditCollection');
        Route::get('stock-management','StockManagement')->name('StockManagement');
        Route::post('add-stock','AddStock')->name('AddStock');
        Route::get('orders','LoadOrders')->name('LoadOrders');
        Route::post('edit-order-state/{order}','EditOrderState')->name('EditOrderState');
        Route::get('homepage-management','HomepageManagement')->name('HomepageManagement');
        Route::post('edit-slot','EditSlotValue')->name('EditSlotValue');
        Route::post('add-featured-product','AddFeaturedProduct')->name('AddFeaturedProduct');
        Route::get('remove-featured-product/{product}','RemoveFeaturedProduct')->name('RemoveFeaturedProduct');
    });
});