<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Tag;

use Input, DB, Redirect;

use Illuminate\Support\MessageBag;

class TagController extends Controller 
{
	/**
	 * Instantiate a new Tag Controller instance.
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

		return view('cms.tags.index')->with('filters', $filters);
	}

	public function create($id = null)
	{
		$tag 										= Tag::findornew($id);

		return view('cms.tags.create', compact('id', 'tag'));
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
		$inputs 										= Input::only('cluster_id', 'name');
		$inputs['type']									= 'tag';

		$tag 											= Tag::findornew($id);	

		$tag->fill($inputs);

		$errors 										= new MessageBag();

		DB::beginTransaction();

		if (!$tag->save())
		{
			$errors->add('Tag', $tag->getError());
		}

		if ($errors->count())
		{
			DB::rollback();
			
			return Redirect::back()
					->withErrors($errors)
					->withInput()
					->with('msg-type', 'danger')
					;
		}
		else
		{
			DB::commit();

			return Redirect::route('cms.tags.index')
					->with('msg', 'Tag has been saved')
					->with('msg-type', 'success')
					;
		}
	}

	public function update($id = null)
	{
		return $this->store($id);		
	}

	public function destroy($id = null)
	{
		$data 								= Tag::findorfail($id);

		DB::beginTransaction();

		if (!$data->delete())
		{
			DB::rollback();
			
			return Redirect::back()
				->withErrors($data->getError())
				->with('msg-type','danger');
		}
		else
		{
			DB::commit();

			return Redirect::route('cms.tags.index')
				->with('msg', 'Tag has been deleted')
				->with('msg-type','success');
		}
	}

	public function AjaxName()
	{
		$input 										= Input::get('name');

		$tags 								= Tag::name($input)->get(['id', 'name']);

		return $tags;
	}

}