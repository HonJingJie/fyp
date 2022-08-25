<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CarsController;


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
    return view('home');
});

Route::get('/posts', [PostsController::class, 'index']);

Route::get('/restaurant', [RestaurantController::class, 'insertform']);
Route::post('/restaurant', [RestaurantController::class, 'insert']);
Route::get('/admin/show', [RestaurantController::class, 'view']);
Route::get('/restaurant/login', [RestaurantController::class, 'loginForm']);
Route::post('/restaurant/login', [RestaurantController::class, 'login']);

Route::resource('/cars', CarsController::class);
Route::resource('/products', ProductsController::class);

Route::get('/admin', function(){
    return view('admin/index');
});
Route::post('/admin/{restaurant}', [RestaurantController::class, 'approve']);
Route::delete('/admin/{restaurant}/delete', [RestaurantController::class, 'reject']);

Route::get('/logout', [RestaurantController::class, 'logout']);