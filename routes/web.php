<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class,'index']);
Route::get('/products/create',[ProductController::class,'create'])->middleware('auth');
Route::get('/products/{id}',[ProductController::class,'show']);
Route::post('/products',[ProductController::class,'store']);
Route::delete('/products/{id}',[ProductController::class,'destroy'])->middleware('auth');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->middleware('auth');
Route::put('/products/update/{id}',[ProductController::class,'update'])->middleware('auth');

Route::get('/produtos', function () {

    $busca = request('search');

    return view('products', ['busca' => $busca]);
});

Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');
