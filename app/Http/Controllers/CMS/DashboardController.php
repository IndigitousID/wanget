<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class DashboardController extends Controller 
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
		return view('cms.dashboard.index');
	}
}