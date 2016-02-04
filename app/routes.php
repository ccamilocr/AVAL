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
Route::get('/', function()
{
	return View::make('form');
});

Route::post('login','UserLogin@user');

Route::get('logout',function()
	{
		Auth::logout();
		return Redirect::to('/');
	});


Route::get('tabla',array('before'=>'auth',function()
{
	return View::make('tabla');
}));

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