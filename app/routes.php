<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** Home Links **/
Route::pattern('id', '[0-9]+');

Route::get('/', 'HomeController@index');

Route::get('productos', 'HomeController@showProducts');

Route::get('productos/ver/{id}/{title?}', 'HomeController@showProductProfile');

Route::get('acerca-de', 'HomeController@showAbout');

Route::get('contacto', 'HomeController@showContact');

Route::get('login', 'AuthController@showLogin');

Route::post('login', 'AuthController@postLogin');

Route::get('registrarse', 'UsersController@showRegister');

Route::post('registrarse', 'UsersController@postRegister');

Route::group(array('before' => 'auth'), function()
{

	Route::post('cesta/agregar', 'OrdersController@agreeBasket');
	Route::post('cesta/actualizar/{id}', 'OrdersController@updateBasket');
	Route::get('cesta/usuarios/{id}/ver', 'OrdersController@showBasket');

    Route::get('logout', 'AuthController@logOut');

	Route::get('admin', 'AdminController@showPanel');
    Route::group(['prefix' => 'admin'], function() {
		
		/** Admin Links **/
		Route::get('productos', 'ProductsController@index');
		Route::get('productos/agregar', 'ProductsController@create');
		Route::post('productos/agregar', 'ProductsController@store');
		Route::get('productos/{id}/editar', 'ProductsController@edit');
		Route::post('productos/{id}/editar', 'ProductsController@update');
		Route::get('productos/borrar/{id}', 'ProductsController@destroy');

		Route::get('modelos', 'ModelosController@index');
		Route::get('modelos/agregar', 'ModelosController@create');
		Route::post('modelos/agregar', 'ModelosController@store');
		Route::get('modelos/{id}/editar', 'ModelosController@edit');
		Route::post('modelos/{id}/editar', 'ModelosController@update');
		Route::get('modelos/borrar/{id}', 'ModelosController@destroy');
		
		Route::get('usuarios', 'UsersController@index');
		Route::get('usuarios/baneados', 'UsersController@bannedUsers');
		Route::get('usuarios/{id}/restaurar', 'UsersController@restoreUser');
		Route::get('usuarios/agregar', 'UsersController@create');
		Route::post('usuarios/agregar', 'UsersController@store');
		Route::get('usuarios/{id}/editar', 'UsersController@edit');
		Route::post('usuarios/{id}/editar', 'UsersController@update');
		Route::get('usuarios/borrar/{id}', 'UsersController@destroy');
		Route::get('usuarios/{id}/perfil', 'UsersController@showProfile');
		
		Route::get('pedidos', 'OrdersController@index');

		Route::controller('users', 'UsersController');
		Route::controller('products', 'ProductsController');
		Route::controller('modelos', 'ModelosController');
	});

});
