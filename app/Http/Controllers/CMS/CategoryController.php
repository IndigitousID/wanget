<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Category;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class CategoryController extends Controller 
{
	/**
	 * Instantiate a new Category Controller instance.
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

		return view('cms.categories.index')->with('filters', $filters);
	}

	public function create($id = null)
	{
		$category 										= Category::findornew($id);

		return view('cms.categories.create', compact('id', 'category'));
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
		$inputs['type']									= 'category';

		$category 										= Category::findornew($id);	

		$category->fill($inputs);

		$errors 										= new MessageBag();

		DB::beginTransaction();

		if (!$category->save())
		{
			$errors->add('Category', $category->getError());
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

			return Redirect::route('cms.categories.index')
					->with('msg', 'Category has been saved')
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
		$data 								= Category::findorfail($id);

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

			return Redirect::route('cms.categories.index')
				->with('msg', 'Category has been deleted')
				->with('msg-type','success');
		}
	}

	public function AjaxName()
	{
		$input 										= Input::get('name');

		$categories 								= Category::name($input)->get(['id', 'name']);

		return $categories;
	}

}