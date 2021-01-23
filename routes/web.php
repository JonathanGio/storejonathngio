<?php

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

Route::get('/', 'FrontendController@index');
Route::get('/product/{sku}', 'FrontendController@show')->name('product.shop');
Route::post('/payorder', 'FrontendController@store')->name('order.pay');
Route::get('success/order/{id}', 'FrontendController@orderpay')->name('order.response.oh');

Auth::routes();

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
});

Route::get('img/products/{filename}', function($filename){
	$path = "../public/img/products/".$filename;

	if (!\File::exists($path)) abort(404);

	$file = \File::get($path);

	$type = \File::mimeType($path);

	$response = Response::make($file,200);

	$response->header("Content-Type", $type);

	return $response;
});

//PDF's
Route::get('/pdf/factura/ticket/{id}', 'FrontendController@ticket')->name('print.now');