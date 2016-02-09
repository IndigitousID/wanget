<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use Input, DB, Redirect, Auth, Carbon\Carbon, Validator;

use Illuminate\Support\MessageBag;

class ProfileController extends Controller 
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
		return view('cms.profile.index');
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
		$inputs 			 	= Input::only('name', 'email', 'avatar');

		$admin 					= Admin::findorfail(Auth::user()->id);

		$admin->fill($inputs);

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