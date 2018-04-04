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

Route::get('/','ItemController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart','CartController@show');

Route::get('/checkout','CartController@checkout');

Route::get('/search','ItemController@search');

Route::post('/add','CartController@add');

Route::get('/{category}','ItemController@sort');

Route::delete('/remove/{item}','CartController@destroy');


/**
 *Creating new user through tinker:
 *
 *App\User::create(['email' => 'admin@net.hr','password' => bcrypt('qwertz')])
 *
 */

/**
 *Login data;
 *
 *Email: admin@net.hr
 *
 *Password: qwertz
 */