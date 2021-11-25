<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\ProductController;
 use App\Http\Controllers\OrderController;
 use App\Http\Controllers\OrderDetailsController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/orders','OrderController');
Route::resource('/order_details','OrderDetailsController');
Route::resource('/products','ProductController');
Route::resource('/suppliers','SupplierController');
   Route::resource('/users','UserController');
  // Route::resource('users', 'App\Http\Controllers\UserController', ['except' => ['create', 'edit']]);
//  Route::get('/users', 'App\Http\Controllers\UserController@index');
//  Route::put('/users/update/{user_id}','UserController@update');
//  Route::delete('/user/destroy/{user_id}','UserController@destroy');
//  Route::post('/users', 'UserController@store');


// Route::get('/users/{id}/edit', 'UserController@edit');


Route::resource('/transactions','TransactionController');
Route::resource('/companies','CompanyController'); //companies.index
