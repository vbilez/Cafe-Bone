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

Route::get('/', function () {
    return view('home');
});
Route::get('/slider', function () {
    return view('slider');
});
Route::get('addtovar',['middleware'=>'auth','uses'=>'TovarsController@add']);
Route::post('addtovar',['middleware'=>'auth','uses'=>'TovarsController@save']);
Route::get('viewtovars',['middleware'=>'auth','uses'=>'TovarsController@view']);
Route::get('/tovar/{id}/edit', ['middleware'=>'auth','as' => 'tovar.edit', 'uses' => 'TovarsController@edit']);
Route::get('/tovar/{id}/delete', ['middleware'=>'auth','as' => 'tovar.delete', 'uses' => 'TovarsController@destroy']);
Route::get('/tovar/{id}', ['as' => 'tovar.shoptovar', 'uses' => 'TovarsController@shoptovar']);
Route::match(array('PUT', 'PATCH'), "/tovar/{id}", array(
	'middleware'=>'auth',
      'uses' => 'TovarsController@update',
      'as' => 'tovar.update'
));
Route::resource('category','CategorysController');
Route::get('/category/{id}/delete', ['middleware'=>'auth','as' => 'category.delete', 'uses' => 'CategorysController@destroy']);
Route::get('/category/{id}/showme', ['middleware'=>'auth','as' => 'category.showme', 'uses' => 'CategorysController@show_filtered']);
Route::get('shop','CategorysController@shop');
//Route::get('shopf','CategorysController@show_filtered');
Route::get('shoptovarcat','CategorysController@shoptovarcat');
Route::get('/cart','BasketController@show');
Route::get('/checkout','BasketController@check');
Route::post('/checkout','BasketController@checkout');
Route::get('/orders',['middleware'=>'auth','uses'=>'BasketController@orders']);
Route::get('/orders/{id}','OrdersController@show');
Route::get('/contacts','CategorysController@contacts');
Route::resource('recipe','RecipesController');
Route::get('/odmin',['middleware'=>'auth','uses'=>'OrdersController@admin']);
Route::get('/spec','CategorysController@remont');
Route::get('/specdiabet','CategorysController@remont');
Route::get('/specparalich','CategorysController@remont');
Route::get('/pronas','CategorysController@remont');
Route::get('/search','CategorysController@remont');
Route::get('/info','CategorysController@remont');

Route::get('/viewrecipes','RecipesController@viewrecipes');
Route::get('/recipe/{id}/delete', ['middleware'=>'auth','as' => 'recipe.delete', 'uses' => 'RecipesController@destroy']);

Route::get('/auth/login','odmin@login');
Route::get('/logout','odmin@logout');
Route::post('/login2','odmin@login2');
Route::post('/loginfromsite','odmin@loginfromsite');

