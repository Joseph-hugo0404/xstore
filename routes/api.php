<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers',[CustomerController::class, 'index']);
Route::get('/customers/{customer}',[CustomerController::class,'show']);
Route::post('/customers',[CustomerController::class, 'store']);
Route::put('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy']);

Route::get('/items',[ItemController::class,'index']);
Route::get('/items/{item}',[ItemController::class,'show']);
Route::post('/items',[ItemController::class, 'store']);
route::put('/items/{item}',[ItemController::class, 'update']);
route::delete('/items/{item}',[ItemController::class,'destroy']);


Route::get('/transactions',[TransactionController::class, 'index']);
Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::put('/transactions/{transaction}',[TransactionController::class, 'update']);

Route::get('/dashboard', function() {
    $allcustomers = Customer::count();
    $items = Item::count();
    $logs = Transaction::count();

    return view('/dashboard', compact('allcustomers', 'items', 'logs'));
});
