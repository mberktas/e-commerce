<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'SpaController@getAllProducts');
Route::get('productDetails/{id}', 'SpaController@getProductDetails');
Route::get('list/{category_id}', 'SpaController@getAllProductsByCategory');
Route::post('list/filter/', 'SpaController@getAllProductsByFilter');



Route::get('/admin/delete/{id}', 'SpaController@deleteProduct');
Route::post('/admin/edit/', 'SpaController@editProduct');
Route::post('/admin/add/', 'SpaController@addProduct');
Route::get('/admin/orders', 'SpaController@getAllOrders');
Route::get('/admin/order/{id}', 'SpaController@getOrderDetails');
Route::get('/admin/customers', 'SpaController@getAllCustomers');

Route::post('/payment/add', 'SpaController@paymentCart');
