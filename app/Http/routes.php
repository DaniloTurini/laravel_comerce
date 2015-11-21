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
Route::get('category/{id}',['as' => 'store.category', 'uses' => 'StoreController@category']);

Route::group(['prefix'=>'admin', 'where' => ['id' => '[0-9]+']], function(){

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

});