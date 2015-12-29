<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','StoreController@index');
Route::get('/home','StoreController@index');
Route::get('category/{id}',['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}',['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}',['as' => 'store.tag', 'uses' => 'StoreController@tag']);
Route::get('cart',['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}',['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/reduce/{id}',['as' => 'cart.reduce', 'uses' => 'CartController@reduce']);
Route::get('cart/destroy/{id}',['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth.admin', 'where' => ['id' => '[0-9]+']], function(){

    Route::get('',['as' => 'admin.index', 'uses' => 'TestController@adminIndex']);

    Route::group(['prefix'=>'categories'], function(){

        Route::get('',['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('create',['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('edit/{id}',['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::get('destroy/{id}',['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::put('update/{id}',['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::post('store',['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
    });

    Route::group(['prefix'=>'products'], function(){

        Route::get('',['as' => 'admin.products.index', 'uses' => 'AdminProductsController@index']);
        Route::get('create',['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('edit/{id}',['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::get('destroy/{id}',['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::put('update/{id}',['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update']);
        Route::post('store',['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);

        Route::group(['prefix'=>'images'], function(){

            Route::get('{id}/product',['as' => 'admin.products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}/product',['as' => 'admin.products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}/product',['as' => 'admin.products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}/image',['as' => 'admin.products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);

        });

    });

    Route::group(['prefix'=>'orders'], function(){
        Route::get('',['as' => 'admin.orders.index', 'uses' => 'AdminOrdersController@index']);
        Route::get('update/{id}',['as' => 'admin.orders.update', 'uses' => 'AdminOrdersController@update']);
    });

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
