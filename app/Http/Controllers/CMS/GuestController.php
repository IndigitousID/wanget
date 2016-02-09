<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Guets;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class GuestController extends Controller 
{
	/**
	 * Instantiate a new Guets Controller instance.
	 */
	
	public function __construct()
	{
		// $this->middleware('passwordneeded', ['only' => ['destroy']]);

		// parent::__construct();
	}

	public function index()
	{	
		$filters 										= null;

		if(Input::has('q'))
		{
			$filters 									= ['name' => Input::get('q')];
		}

		return view('cms.guests.index')->with('filters', $filters);
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
		return Redirect::back();
	}

	public function update($id = null)
	{
		return $this->store($id);		
	}

	public function destroy($id = null)
	{
		$data 								= Guest::findorfail($id);

		DB::beginTransaction();

		$data->is_active 					= false;

		if (!$data->save())
		{
			DB::rollback();
			
			return Redirect::back()
				->withErrors($data->getError())
				->with('msg-type','danger');
		}
		else
		{
			DB::commit();

			return Redirect::route('cms.guests.index')
				->with('msg', 'Guest has been deleted')
				->with('msg-type','success');
		}
	}
}