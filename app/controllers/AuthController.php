<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		return View::make('login');
	}

	public function postLogin()
	{
		$data = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		if (Auth::attempt($data, Input::get('remember')))// Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
       
           	 
		{
			// Si nuestros datos son correctos mostramos la página de inicio
			return Redirect::intended('/');
		}
		return Redirect::back()->with('error_message', 'Invalid data')->withInput();
	}

	public function logOut()
	{
		Auth::logout();
		return Redirect::to('login')->with('error_message', 'Logged out correctly');
	}

}