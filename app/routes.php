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
Route::get('/','FormularioController@InicioForm');

//ruta del inicio pero entra directo sin array 
Route::get('acceso', function()
{
	return View::make('inisesion');
});

Route::post('login','UserLogin@user');

Route::get('logout',function()
	{
		Auth::logout();
		return Redirect::to('/');
	});
//Rutas para activar los controladores
Route::controller('formulario','FormularioController');


/*Route::get('tabla',array('before'=>'auth',function()
{
	return View::make('tabla');
}));*/

Route::get('tabla', array('before' => 'auth', 'uses' => 'TablaController@Datos'));

Route::get('excelcar', array('before' => 'auth', 'uses' => 'TablaController@Excelcarini'));

/*
Route::get('registrar', function()
{
	$user = new User;
    $user->username = "prueba";
    $user->password = Hash::make('1234');
	// guardamos
	$user->save();
	return "El usuario fue agregado.";
});
Route::get('creartabla', function()
{
	Schema::create('users', function($tabla)
	{
		$tabla->increments('id');
		$tabla->string('username')->unique();		
		$tabla->string('password');
		$tabla->string('remember_token');
		$tabla->timestamps();
	});
});
*/
