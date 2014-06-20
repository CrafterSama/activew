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
	Route::get('cesta', 'OrdersController@showBasket');

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



/* CART */
Route::get('/cart', ['uses' => 'CartController@get_cart'] );
Route::get('/cart/remove/{rowid}', ['uses' => 'CartController@get_removeitem'] );
Route::post('/cart/{id}/add/{qty}', ['uses' => 'CartController@post_add'] );
Route::get('/cart/minus/{rowid}', ['uses' => 'CartController@post_minus'] );
Route::get('/cart/plus/{rowid}', ['uses' => 'CartController@post_plus'] );

Route::post('/procesar', ['uses' => 'CartController@post_procesar'] );

Route::get('/factura', function()
{
    return View::make('emails.factura'); 
});

Route::get('/procesado', function()
{
    $categorias = DB::table('categorias')->get();
    return View::make('index', array('categorias' => $categorias, 'msg' => "Orden procesada, revise su email para completar el proceso."));
});

Route::get('/datos-enviados', function()
{
    $categorias = DB::table('categorias')->get();
    return View::make('index', array('categorias' => $categorias, 'msg' => "Datos de pago enviados, te responderemos a la brevedad posible."));
});

Route::get('/factura/{slug}', ['uses' => 'CartController@get_factura'] );

Route::get('/carrito', function()
{
    $cart = Cart::content();
    return View::make('home.carrito', array('cart' => $cart )); 
});

Route::post('/total', function()
{
    echo '(' . Cart::count() .') Carrito <span class="fa fa-shopping-cart fa-lg white"></span>';
});
