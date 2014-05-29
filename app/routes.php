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
Route::get('/', 'HomeController@index');
Route::get('productos', 'HomeController@showProducts');
Route::get('acerca-de', 'HomeController@showAbout');
Route::get('contacto', 'HomeController@showContact');


/** Admin Links **/



Route::group(array('before'=>'admin'), function()
{


});

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

Route::get('registrarse', 'UsersController@showRegister');

Route::post('registrarse', 'UsersController@postRegister');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta será nuestra ruta de bienvenida.
	Route::get('admin', 'AdminController@showPanel');
   
    Route::group(['prefix' => 'admin'], function() {
		
		
		#Route::get('productos', 'ProductsController@index');
		Route::get('productos/agregar', 'ProductsController@create');
		Route::post('productos/agregar', 'ProductsController@store');
		Route::get('productos/{id}/editar', 'ProductsController@edit');
		Route::post('productos/{id}/editar', 'ProductsController@update');
		Route::delete('productos/{id}/borrar', 'ProductsController@destroy');


		#Route::get('modelos', 'ModelosController@index');
		Route::get('modelos/agregar', 'ModelosController@create');
		Route::post('modelos/agregar', 'ModelosController@store');
		Route::get('modelos/{id}/editar', 'ModelosController@edit');
		Route::post('modelos/{id}/editar', 'ModelosController@update');
		Route::delete('modelos/{id}/borrar', 'ModelosController@destroy');
		


		#Route::get('usuarios', 'UsersController@index');
		Route::get('usuarios/baneados', 'UsersController@bannedUsers');
		Route::get('usuarios/{id}/restaurar', 'UsersController@restoreUser');
		Route::get('usuarios/agregar', 'UsersController@create');
		Route::post('usuarios/agregar', 'UsersController@store');
		Route::get('usuarios/{id}/editar', 'UsersController@edit');
		Route::post('usuarios/{id}/editar', 'UsersController@update');
		Route::delete('usuarios/{id}/borrar', 'UsersController@destroy');
		Route::get('usuarios/{id}/perfil', 'UsersController@showProfile');
		
		Route::get('pedidos', 'OrdersController@index');

		Route::resource('usuarios', 'UsersController');
		Route::resource('productos', 'ProductsController');
		Route::resource('modelos', 'ModelosController');
	});

	Route::get('pedidos', 'HomeController@showOrders');
	Route::get('usuarios/{id}/pedidos', 'OrdersController@showByUser');

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});
