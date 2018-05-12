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
    return view('auth/login');
});

Route::resource('almacen/categoria', 'CategoriaController');
Route::patch('almacen/categoria/{id}/edit', array('as' => 'almacen.categoria.update', 'uses' => 'CategoriaController@update'));

Route::resource('almacen/articulo', 'ArticuloController');
Route::patch('almacen/articulo/{id}/edit', array('as' => 'almacen.articulo.update', 'uses' => 'ArticuloController@update'));

Route::resource('ventas/cliente', 'ClienteController');
Route::patch('ventas/cliente/{id}/edit', array('as' => 'ventas.cliente.update', 'uses' => 'ClienteController@update'));

Route::resource('compras/proveedor', 'ProveedorController');
Route::patch('compras/proveedor/{id}/edit', array('as' => 'compras.proveedor.update', 'uses' => 'ProveedorController@update'));

Route::resource('seguridad/usuario', 'UsuarioController');
Route::patch('seguridad/usuario/{id}/edit', array('as' => 'seguridad.usuario.update', 'uses' => 'UsuarioController@update'));

Route::resource('compras/ingreso', 'IngresoController');

Route::resource('ventas/venta', 'VentaController');

Auth::routes();

Route::get('/{slug?}', 'HomeController@index');