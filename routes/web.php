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
Route::get("/",function(){
    return view("index");
});
Route::get("/examples",function(){
    return view("examples");
});
Route::get("/welcome",function(){
    return view("welcome");
});
Route::get("/about/{f}",function(){
    return view("about");
});

//With controller
Route::group(['prefix'=>'admin'],function(){
    Route::get("/ll/{ids?}",'App\Http\Controllers\TestController@indexs')->name('index');
});


//__CRUD__//
Route::group(['prefix'=>'crud'], function(){
    Route::get('/','App\Http\Controllers\Crud\Crud@index')->name('read');
    Route::get('/create', 'App\Http\Controllers\Crud\Crud@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Crud\Crud@store')->name('store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Crud\Crud@edit')->name('edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Crud\Crud@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\Crud\Crud@delete')->name('delete');
});
