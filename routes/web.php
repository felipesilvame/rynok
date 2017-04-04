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



//Auth::routes();
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::post('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['uses' => 'Auth\ResetPasswordController@reset']);
//Comment to disable
//Route::post('registro', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
//Route::get('registro', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);

Route::get('admin/crearEmpresa', ['as' => 'admin.crearEmpresa', 'uses' => 'AdminController@crearEmpresa']);
Route::post('admin/crearEmpresa', ['as' => 'admin.storeEmpresa', 'uses' => 'AdminController@storeEmpresa']);
Route::get('empresas', ['as' => 'admin.verEmpresas', 'uses' => 'AdminController@verEmpresas']);

Route::get('admin/crearUsuario', ['as' => 'admin.crearUsuario', 'uses' => 'AdminController@crearUsuario']);
Route::post('admin/crearUsuario', ['as' => 'admin.storeUsuario', 'uses' => 'AdminController@storeUsuario']);
Route::get('usuarios', ['as' => 'admin.verUsuarios', 'uses' => 'AdminController@verUsuarios']);


Route::get('/perfil', ['as' => 'perfil', 'uses' => 'ProfileController@index']);
Route::post('/perfil/guardar', ['as' => 'perfil.store', 'uses' => 'ProfileController@store']);

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::resource('/ventaAccions', 'VentaAccionController');

Route::get('/info/get_provincias/{cardinal}', ['as' => 'info.get_cities','uses' => 'InformationController@get_cities']);
Route::get('/info/get_comunas/{id}', ['as' => 'info.get_towns','uses' => 'InformationController@get_towns']);
Route::get('/info/get_info_rut/{id}', ['as' => 'info.get_info_rut','uses' => 'InformationController@get_info_rut']);