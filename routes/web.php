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

// Route::get('user/api', [
// 	'as' => 'user.api',
// 	'uses' => 'API\UserApiController@index'
// ]);

// Route::get('user' , [
// 	'as' => 'users.index',
// 	'uses' => 'UserController@index'
// ]);
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('user', 'UserController', ['except' => ['show', 'destroy']]);
	Route::resource('provider', 'ProviderController', ['except' => ['show', 'destroy']]);
	Route::resource('article', 'ArticleController', ['except' => ['show', 'destroy']]);
});

	// Route::group(['middleware' => 'role:admin'], function(){
	// Route::get('user/link', 'UserController@getLink')->name('linkuser');	
	// 	Route::resource('center', 'CenterController', ['except' => ['show', 'create', 'edit']]);
	// 	Route::get('center/link', 'CenterController@getLink')->name('linkcenter');
		
	// 	Route::resource('position', 'PositionController', ['except' => ['show', 'create', 'edit']]);
	// 	Route::get('position/link', 'PositionController@getLink')->name('linkposition');

	// });

	// Route::group(['middleware' => 'role:edit'], function(){
	// 	Route::resource('document', 'DocumentController', ['except' => ['show', 'create', 'edit']]);
	// 	Route::get('document/link', 'DocumentController@getLink')->name('linkdocument');

	// 	Route::resource('solicitud', 'SolicitudController', ['except' => ['show', 'create', 'edit']]);
	// 	Route::get('solicitud/link', 'SolicitudController@getLink')->name('linksolicitud');
	// });

	// Route::get('changessystem/link', 'ChangesSystemController@getLink')->name('linkchangessystem');
	// Route::get('changessystem/listdetailed', 'ChangesSystemController@getLinkDetailed')->name('listdetailedchanges');
	// Route::get('listdetailedchanges', 'ChangesSystemController@getListDetailed');
	// Route::get('approvechange/{id}', 'ChangesSystemController@getApprove')->name('approvechangessystem');
	// Route::get('runchange/{id}', 'ChangesSystemController@getRunChange')->name('runchangessystem');
	// Route::resource('changessystem', 'ChangesSystemController');
	// Route::post('observation/{id}', 'ChangesSystemController@storeObservation')->name('saveobservation');
	// Route::get('observation/{id}', 'ChangesSystemController@showObservation')->name('showobservation');

	// Route::get('descargar-changessystem', 'ChangesSystemController@exportExcel')->name('changes.excel');
