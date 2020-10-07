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

Route::get('detail/{id}','PageController@itemdetail')->name('itemdetailpage');

Route::get('promotions','PageController@promotions')->name('promotionspage');

Route::get('itemsbybrand/{id}','PageController@itemsbybrand')->name('itemsbybrandpage');

Route::get('itemsbycategory/{id}','PageController@itemsbycategory')->name('itemsbycategorypage');

Route::get('filteritems/{id}','PageController@filteritems')->name('filteritemspage');

Route::get('shoppingcart','PageController@shoppingcart')->name('shoppingcartpage');

Route::get('loginform','PageController@login')->name('loginpage');

Route::get('registerform','PageController@register')->name('registerpage');

// Backend---------------------------
Route::resource('orders','OrderController'); // 7 => GET/POST/PUT/DELETE

Route::middleware('role:Admin')->group(function () {

  Route::get('dashboard','BackendController@dashboardfun')->name('dashboardpage');

  Route::resource('items','ItemController');

  // testing video, auto post facebook
  Route::resource('videos','VideoController');

  // Send video to Facebook Route
  // Route::get('send-video-to-facebook', 'SocialSharingController@sendVideoToFacebook');
  
  // testing summernote image errors
  Route::resource('posts','PostController');

  // testing map
  Route::resource('maps','MapController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
