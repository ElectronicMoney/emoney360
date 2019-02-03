<?php

use Illuminate\Http\Request;

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


/**
 * ==============AUTHENTICATION MIDDLEWARE ROUTE================
 */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * ==============BUYER ROUTE================
 */
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);

/**
 * ==============Seller ROUTE================
 */
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

/**
 * ==============Category ROUTE================
 */
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

/**
 * ==============Product ROUTE================
 */
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);

/**
 * ==============Transaction ROUTE================
 */
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);

/**
 * ==============UUSER ROUTE================
 */
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
