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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'App\Http\Controllers\api\ApiController@login')->name('loginApi');
Route::group(['middleware'=>'App\Http\Middleware\ApiMiddleware'],function(){ //simple middleware api auth check
    Route::get('app',function(){
        return response()->json([
            'name'=>'Mahdi',
            'email'=>'mahdi@gmail.com'
        ]);
    });
});

