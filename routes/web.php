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
Route::get('/', 'NewsController@index');
Auth::routes(['verify'=>true]);
route::resource('category','CategoryController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/items', 'ItemController@admin_index')->name('item.admin_index');
Route::get('/myCart', 'CardController@index');
route::resource('item','ItemController');
route::resource('order','OrderController');
route::resource('news','NewsController');
route::resource('card','CardController');
//Route::group(['middleware'=>['auth','admin']],function (){
// });
