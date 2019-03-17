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

Route::get('/login','LoginController@index');
Route::post('/login','LoginController@login')->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'AuthWare'],function(){
Route::get('/','AdminController@index')->name('dashboard');

//categories
Route::get('/categories','AdminController@categories')->name('categories');
Route::post('/addcategory','AdminController@addcategory')->name('addcategory');
Route::get('deletecat/{id}','AdminController@deletecat')->name('deletecat');
Route::get('editcat/{id}','AdminController@editCat')->name('editcat');
Route::post('editcategory','AdminController@editcategory')->name('editcategory');


//users

Route::get('users','AdminController@users')->name('users');
Route::post('adduser','AdminController@adduser')->name('adduser');
Route::get('edituser/{id}','AdminController@edituser')->name('edituser');
Route::get('deleteuser/{id}','AdminController@edituser')->name('deleteuser');



});
