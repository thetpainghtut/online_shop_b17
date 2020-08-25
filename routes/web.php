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

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend

Route::get('/','PageController@home')->name('homepage');

Route::get('detail','PageController@itemdetail')->name('itemdetailpage');

Route::get('promotions','PageController@promotions')->name('promotionspage');

Route::get('itemsbybrand','PageController@itemsbybrand')->name('itemsbybrandpage');

Route::get('filteritems','PageController@filteritems')->name('filteritemspage');

Route::get('shoppingcart','PageController@shoppingcart')->name('shoppingcartpage');

Route::get('login','PageController@login')->name('loginpage');

Route::get('register','PageController@register')->name('registerpage');

// Backend

Route::get('dashboard','BackendController@dashboardfun')->name('dashboardpage');





