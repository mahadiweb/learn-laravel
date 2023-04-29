<?php

use Illuminate\Support\Facades\Route;
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


//__Testing Route__//
Route::get("/",function(){
    return view("index");
});
Route::get("/examples",function(){
    return view("examples");
});
Route::get("/welcome",function(){
    return view("welcome");
});
Route::get("/about/{f}",function($f){ // get url parameter
    return $f;
});

Route::get("/search",function(Request $request){  //get query url parameter example: search?tag=laravel&data=game
    if ($request->tag) {
        return e($request->tag);
    }else{
        abort(404); //return 404 error
    }
});

Route::group(['prefix'=>'admin'],function(){      //With controller
    Route::get("/ll/{ids?}",'App\Http\Controllers\TestController@indexs')->name('index');
});



//__CRUD__//
Route::group(['prefix'=>'crud','namespace'=>'App\Http\Controllers\Crud'], function(){
    Route::get('/','Crud@index')->name('read')->middleware('App\Http\Middleware\Role:admin.home');
    Route::get('/create', 'Crud@create')->name('create')->middleware('App\Http\Middleware\Role:admin.creates');
    Route::post('/store', 'Crud@store')->name('store');
    Route::get('/edit/{id}', 'Crud@edit')->name('edit')->where('id', '[0-9]+'); //filter id with regular expression
    Route::PUT('/update/{id}', 'Crud@update')->name('update')->where('id', '[0-9]+'); //filter id with regular expression
    Route::get('/delete/{id}', 'Crud@delete')->name('delete')->where('id', '[0-9]+'); //filter id with regular expression
    Route::get('/search','Crud@search')->name('search');
});



//__Auth__//
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');