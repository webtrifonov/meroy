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

Route::get('/', ['as' => 'index', 'uses' => 'ProjectControllers\IndexController@show']);
Route::get('/about', ['as' => 'about', 'uses' => 'ProjectControllers\SinglePageController@showAbout']);
Route::get('/delivery', ['as' => 'delivery', 'uses' => 'ProjectControllers\SinglePageController@showDelivery']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'ProjectControllers\IndexController@show']);
Route::get('/cart', ['as' => 'cart', 'uses' => 'ProjectControllers\IndexController@show']);

//Route::get('/login', ['as' => 'cart', 'uses' => 'ProjectControllers\IndexController@show']);
//Route::get('register', ['as' => 'cart', 'uses' => 'ProjectControllers\IndexController@show']);

Route::get('/products', function(){
	echo 'products';
});
Route::get('/product/{id}', ['as' => 'product.id', 'uses' => 'ProjectControllers\ProductController@show']);
Route::get('/categories', ['as' => 'categories', 'uses' => 'ProjectControllers\CategoryController@showAll']); 
Route::get('/category/{id}', ['as' => 'category.id', 'uses' => 'ProjectControllers\CategoryController@show']);
//Route::get('category/{alias}', ['as' => 'category.alias', 'uses' => 'ProjectControllers\CategoryController@show']);

Auth::routes();

//	Route::get('login', 'HomeController@index')->name('login');


Route::group([
	'prefix' => 'auth', 
	'middleware' => ['web', 'auth'],

], function(){
	Route::get('/', ['as' => 'admin.index', 'uses' => 'ProjectControllers\AdminController@show']);

	Route::resource('slide', 'ProjectControllers\SliderController');
	Route::resource('category', 'ProjectControllers\CategoryController');
	Route::resource('product', 'ProjectControllers\ProductController');

 	// Route::get('/{name}', function($n){
 		// echo $n;
	// });
// 
});




