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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
	Route::group(['middleware' => 'role:admin'], function (){
		Route::resource('user', 'UserController', ['except' => ['show', 'destroy', 'edit']]);
		Route::get('user/link', 'UserController@getLink')->name('linkuser');		
	});

	Route::group(['middleware' => 'role:edit'], function(){
		Route::resource('provider', 'ProviderController', ['except' => ['show', 'destroy', 'edit']]);
		Route::get('provider/link', 'ProviderController@getLink')->name('linkprovider');
		
	});

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('provider/list', 'ProviderController@getProviders');
	Route::resource('article', 'ArticleController', ['except' => ['show', 'create']]);
	Route::get('article/link', 'ArticleController@getLink')->name('linkarticle');
	Route::get('article/list', 'ArticleController@getArticles');
	Route::resource('inventory', 'InventoryController');	
	Route::get('inventario/link', 'InventoryController@getLink')->name('linkinventary');
	Route::get('inventario/saldo/{id}', 'InventoryController@getSaldoArticle');
	Route::get('salida', 'InventoryController@createSalida');
	Route::get('salida/list', 'InventoryController@getSalida');
	Route::get('entrada', 'InventoryController@createEntrada');
	Route::get('entrada/list', 'InventoryController@getEntrada');
	Route::get('prueba', 'InventoryController@getSaldoArticle');
});