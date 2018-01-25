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
Route::get('see',function (){
    return view('see');
});
Route::get('/', 'FictionController@list_article');
Route::get('/test', 'FictionController@test');
Route::get('{id}','FictionController@art');

