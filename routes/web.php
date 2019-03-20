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
//check


Route::get('/login','LoginController@index');
//Route::get('/','LoginController@index');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

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
Route::post('updateuser','AdminController@updateuser')->name('updateuser');
Route::get('deleteuser/{id}','AdminController@deleteUser')->name('deleteuser');


//blogs

Route::get('addblog','BlogController@addblog')->name('addblog');
Route::post('publishblog','BlogController@publishblog')->name('publishblog');
Route::get('editblog/{id}','BlogController@editblog')->name('editblog');
Route::post('updateblog','BlogController@updateblog')->name('updateblog');
Route::get('deleteblog/{id}','BlogController@deleteblog')->name('deleteblog');
Route::get('blogs','BlogController@index')->name('blogs');
Route::get('catblogs/{id}','BlogController@catblogs')->name('catblogs');

//About Us
Route::get('about/','AdminController@about')->name('aboutus');
Route::post('saveabout','AdminController@saveabout')->name('saveabout');

//Contact Us

Route::get('contact','AdminController@contact')->name('contact');
Route::post('savecontactusdescription','AdminController@savecontactusdescription')->name('savecontactusdescription');



});


//frontend Routes
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/blog/{id}', 'FrontendController@blog')->name('blog');
Route::get('/blogsbycategory/{id}', 'FrontendController@blogsByCat')->name('blogsbycategory');
Route::get('about','FrontendController@about')->name('about');
Route::get('contactus','FrontendController@contactus')->name('contactus');


