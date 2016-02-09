<?php namespace App\Http\Controllers\Onegate;

use App\Http\Controllers\Controller;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class ContactController extends Controller 
{
	/**
	 * Instantiate a new Comment Controller instance.
	 */
	
	public function __construct()
	{
		// $this->middleware('passwordneeded', ['only' => ['destroy']]);

		// parent::__construct();
	}

	public function index()
	{
		return view('onegate.contact.index');
	}


	public function store()
	{
		return Redirect::back();
	}
}