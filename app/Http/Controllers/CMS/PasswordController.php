<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use Input, DB, Redirect, Auth, Carbon\Carbon, Validator;

use Illuminate\Support\MessageBag;

class PasswordController extends Controller 
{
	/**
	 * Instantiate a new Password Controller instance.
	 */
	
	public function __construct()
	{
		// $this->middleware('passwordneeded', ['only' => ['destroy']]);

		// parent::__construct();
	}

	public function index()
	{	
		return view('cms.password.index');
	}

	public function create($id = null)
	{
		return Redirect::back();
	}

	public function edit($id)
	{
		return $this->create($id);		
	}

	public function show($id = null)
	{
		return Redirect::back();
	}

	public function store($id = null)
	{
		$email	 					= Auth::user()->email;
		$inputs 					= Input::only('password', 'old_password', 'password_confirmation');

		$check 						= Auth::attempt(['email' => $email, 'password' => $inputs['old_password']]);

		if (!$check)
		{
			return Redirect::back()->withErrors('Password mismatch!')->with('msg-type', 'danger');
		}

		$rules 					= ['password' => 'required|min:8|confirmed'];

		$validator 				= Validator::make($inputs, $rules);

		if(!$validator->passes())
		{
			return Redirect::back()->withErrors($validator->errors)->with('msg-type', 'danger');
		}

		$admin 					= Admin::findorfail(Auth::user()->id);

		$admin->password 		= $inputs['password'];

		if(!$admin->save())
		{
			return Redirect::back()->withErrors($admin->getError)->with('msg-type', 'danger');
		}

		return Redirect::route('cms.dashboard.index')->with('msg', 'Password has been changed')->with('msg-type', 'success');
	}

	public function update($id = null)
	{
		return $this->store($id);		
	}

	public function destroy($id = null)
	{
		return Redirect::back();
	}
}