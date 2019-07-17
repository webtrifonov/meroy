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
    Route::post('/contacts', ['uses' => 'SinglePageController@sendMessage']);

    Route::get('/product/{id}', ['as' => 'product.id', 'uses' => 'ProductController@show']);
    Route::get('/categories', ['as' => 'categories', 'uses' => 'CategoryController@showAll']); 
    Route::get('/category/{category}', ['as' => 'category.id', 'uses' => 'CategoryController@show']);
    Route::get('/search', ['as' => 'search', 'uses' => 'ProductController@search']);

    Route::get('/products/new', ['as' => 'products.new', 'uses' => 'ProductController@newProducts']);
    Route::get('/products/popular', ['as' => 'products.popular', 'uses' => 'ProductController@popularProducts']);


});

Route::group(['namespace' => 'Customer'], function() {
    Route::get('/login', ['as' => 'customer.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['uses' => 'LoginController@login']);
    Route::post('/logout', ['as' => 'customer.logout', 'uses' => 'LoginController@logout']);

    Route::get('/register', ['as' => 'customer.register', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/register', ['uses' => 'RegisterController@register']);

//    Route::post('password/email', ['as' => 'customer.password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
//    Route::get('password/reset', ['as' => 'customer.password.request', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
//    Route::post('password/reset', ['as' => 'customer.password.update', 'uses' => 'ResetPasswordController@reset']);
//    Route::get('password/reset/{token}', ['as' => 'customer.reset', 'uses' => 'ResetPasswordController@showResetForm']);

    Route::group(['middleware' => ['web', 'customer:customer']], function() {
        Route::post('cart/addOrder', ['as' => 'customer.addOrder', 'uses' => 'CustomerController@addOrder']);
        Route::get('/account', ['as' => 'customer.account', 'uses' => 'CustomerController@index']);
        Route::get('/account/personal', ['as' => 'customer.personal', 'uses' => 'CustomerController@personal']);
        Route::post('/account/personal', ['uses' => 'CustomerController@updatePersonal']);


    });

});
Route::post('/checkout', ['middleware' => ['customer:customer'], 'uses' => 'V0\CustomerController@checkout']);

use App\Http\Requests\Test;
use Illuminate\Http\Request;
Route::get('/products', function(Test $request){
    //$validator = Validator::make($request->all(),[
    //    'name'=>'required'
    //]);

    //if($validator->fails()) {
    //    return redirect()->route('about')->withErrors($validator)->withInput()->with(['sosi' => 'jopy']);
    //}
    //$validator = Validator::make($request->all(), [
    //    'name' => 'required'
    //]);
    //dd($validator->fails());
    //$request->validate([
    //    'p' => 'min:2'
    //]);
    //$request->validated();
    dump($request->all());

    session(['key' => ['a1', 'a2']]);
    session()->push('key.wq', 'a3');
    //session()->forget(0);
    dump(session()->all());

});

//Route::get('category/{alias}', ['as' => 'category.alias', 'uses' => 'ProjectControllers\CategoryController@show']);

Route::get('/cart', ['as' => 'cart', 'uses' => 'Customer\CustomerController@showCart']);
//Auth::routes();
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login',                  'LoginController@showLoginForm')->name('auth.login');
    Route::post('login',                 'LoginController@login');
    Route::post('logout',                'LoginController@logout')->name('auth.logout');

    Route::get('register',               'RegisterController@showRegistrationForm')->name('auth.register');
    Route::post('register',              'RegisterController@register');

    Route::post('password/email',        'ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
    Route::get('password/reset',         'ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
    Route::post('password/reset',        'ResetPasswordController@reset')->name('auth.password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('auth.password.reset');
});
Route::group([
	'prefix' => 'auth',
	'middleware' => ['auth', 'not_customer'],
    'namespace' => 'Admin'
], function(){
	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@show']);

	//Route::resource('slide', 'SliderController');
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'order.index', 'uses' => 'OrderController@index']);
        Route::get('/order/{order}', ['as' => 'order.show', 'uses' => 'OrderController@show']);
        Route::patch('/order/{order}', ['as' => 'order.update', 'uses' => 'OrderController@update']);
    });
    Route::group(['prefix' => 'slides'], function () {
        Route::get('/', ['as' => 'slide.index', 'uses' => 'SliderController@index']);
        Route::get('/slide/{slide}', ['as' => 'slide.show', 'uses' => 'SliderController@show']);
        Route::patch('/slide/{slide}', ['as' => 'slide.update', 'uses' => 'SliderController@update']);
        Route::get('/create', ['as' => 'slide.create', 'uses' => 'SliderController@create']);
        Route::post('/store', ['as' => 'slide.store', 'uses' => 'SliderController@store']);
        //Route::get('/delete', ['as' => 'slide.delete', 'uses' => 'SliderController@delete']);
        Route::delete('/slide/{slide}', ['as' => 'slide.destroy', 'uses' => 'SliderController@destroy']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
        Route::get('/category/{category}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
        Route::patch('/category/{category}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
        Route::get('/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
        Route::post('/store', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
        Route::get('/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
        Route::delete('/category/{category}', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::get('/product/{product}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
        Route::patch('/product/{product}', ['as' => 'product.update', 'uses' => 'ProductController@update']);
        Route::get('/create', ['as' => 'product.create', 'uses' => 'ProductController@create']);
        Route::post('/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
        Route::get('/delete', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);
        Route::delete('/product/{product}', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
    });
	//Route::resource('category', 'CategoryController');
	Route::get('category/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
	//Route::resource('product', 'ProductController');
	Route::get('product/delete', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);


 	// Route::get('/{name}', function($n){
 		// echo $n;
	// });
});




