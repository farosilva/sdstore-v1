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

Route::group(['prefix' => 'delivery'], function () {
    Route::any('/get-city-by-code', 'DeliveryController@getCityByCode');
    Route::any('/set-remember', 'DeliveryController@setRemember');
});

Route::group(['prefix' => 'cadastro'], function () {
    Route::any('/contato', 'ContactController@store');
});

Route::any('/notifications/pagseguro', 'NotificationController@pagSeguro');
Route::any('/notifications/pagseguro2', function(Request $request){
    return $request;
});
