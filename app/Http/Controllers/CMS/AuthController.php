<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Input, Session, DB, Redirect, Auth;

class AuthController extends Controller 
{
	public function postLogin()
	{ 
		$email	 					= Input::get('email');
		$password 					= Input::get('password');

		$check 						= Auth::attempt(['email' => $email, 'password' => $password]);

		if ($check)
		{
			$redirect 				= Session::get('login_redirect');
			Session::forget('login_redirect');

			return Redirect::intended($redirect);
		}
		
		return Redirect::back()->withErrors(['Email dan password yang anda masukkan tidak cocok dengan data kami. Harap anda memeriksa data masukkan dan mencoba lagi.'])->with('msg-type', 'danger');
	}

	public function getLogout()
	{
		Auth::logout();
		
		Session::flush();

		return Redirect::route('cms.dashboard.index');
	}
}