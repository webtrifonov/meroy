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
Route::group(['namespace' => 'ProjectControllers'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@show']);
    Route::get('/about', ['as' => 'about', 'uses' => 'SinglePageController@showAbout']);
    Route::get('/delivery', ['as' => 'delivery', 'uses' => 'SinglePageController@showDelivery']);
    Route::get('/contacts', ['as' => 'contacts', 'uses' => 'SinglePageController@showContacts']);
    
    Route::post('/contacts', ['as' => 'postcontacts', 'uses' => 'SinglePageController@postContacts']);

    Route::get('/product/{id}', ['as' => 'product.id', 'uses' => 'ProductController@show']);
    Route::get('/categories', ['as' => 'categories', 'uses' => 'CategoryController@showAll']); 
    Route::get('/category/{category}', ['as' => 'category.id', 'uses' => 'CategoryController@show']);
    Route::get('/search', ['as' => 'search', 'uses' => 'ProductController@search']);

    Route::get('/products/new', ['as' => 'products.new', 'uses' => 'ProductController@newProducts']);
    Route::get('/products/popular', ['as' => 'products.popular', 'uses' => 'ProductController@popularProducts']);
});

Auth::routes();

Route::get('/products', function(){
    echo 'products';
});

//Route::get('category/{alias}', ['as' => 'category.alias', 'uses' => 'ProjectControllers\CategoryController@show']);

//	Route::get('login', 'HomeController@index')->name('login');
Route::get('/cart', ['as' => 'cart', 'uses' => 'Customer\CustomerController@showCart']);

Route::group([
	'prefix' => 'auth', 
	'middleware' => ['web', 'auth'],
    'namespace' => 'Admin'
], function(){
	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@show']);

	Route::resource('slide', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');

 	// Route::get('/{name}', function($n){
 		// echo $n;
	// });
});




