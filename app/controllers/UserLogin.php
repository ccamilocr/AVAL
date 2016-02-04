<?php


class UserLogin extends Basecontroller
{
	
	public function user()
	{
		//get  POST data
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			
		);
	
	//'estado'=> $user->estado;


		if (Auth::attempt($userdata))
		{
			
			return Redirect::to('tabla');
		}
				// usted esta logueado		
		else
		{
			return Redirect::to('/')->with('login_errors', true);
		}
	}
}
	
?>