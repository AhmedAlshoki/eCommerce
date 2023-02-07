<?php

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\App;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
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

Route::get("/login", function () {
    return view("login");
});   

Route::get("/signup", function () {
    return view("signup");
});  
Route::post("/login",[UserController::class,'login']);

Route::get("/products", [ProductController::class,'getData']);

Route::get("/products/{lang}", function ($lang) {
    return App::call('App\Http\Controllers\ProductController@getData' , ['lang' => $lang]);
});

Route::view("/", "login");


Route::get("/logout",[UserController::class,'logout']);

Route::view("/AddProduct","AddProduct");

Route::post("/AddNewProduct",[ProductController::class,"AdviewProductdNewProduct"]);

Route::post('/signup', [UserController::class, "signup"]);

Route::get('/profile', function (Request $request) {
    return view("userprofile", ['request' => $request]);
});

Route::get("/{name}", function ($name) {
    return view("welcome", ["name" => $name]);
});


Route::get("product/{product_id}", function ($product_id) { 
    return App::call('App\Http\Controllers\ProductController@viewProduct' , ['product_id' => $product_id]);
});

Route::get("order/{buyer}/{product}", function ($buyer, $product) {
    return App::call('App\Http\Controllers\OrderController@CreateOrder' , ['product_id' => $product,'buyer_id' => $buyer]);
});

