<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use App\Models\Article;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class ArticleController extends Controller 
{
	/**
	 * Instantiate a new Article Controller instance.
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

		return view('cms.articles.index')->with('filters', $filters);
	}

	public function create($id = null)
	{
		$article 										= Article::findornew($id);

		return view('cms.articles.create', compact('id', 'article'));
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
		$inputs 										= Input::only('title', 'published_at', 'content', 'summary', 'thumbnail', 'category', 'tag');

		$article 										= Article::findornew($id);	

		if(is_null($id))
		{
			$inputs['user_id']							= Auth::user()->id;
		}
		elseif($article->user_id!=Auth::user()->id)
		{
			return Redirect::back()
				->withErrors('Authorization rejected!')
				->with('msg-type','danger');
		}


		$article->fill($inputs);

		$errors 										= new MessageBag();

		DB::beginTransaction();

		if (!$article->save())
		{
			$errors->add('Article', $article->getError());
		}
		else
		{
			// category
			$categories 								= explode(',', $inputs['category']);
			// tag
			$tags 										= explode(',', $inputs['tag']);

			$global										= array_merge($categories, $tags);

			if(!$article->clusters()->sync($global))
			{
				$errors->add('Article', $article->getError());
			}
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

			return Redirect::route('cms.articles.index')
					->with('msg', 'Article has been saved')
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
		$data 								= Article::findorfail($id);

		if($data->user_id!=Auth::user()->id)
		{
			return Redirect::back()
				->withErrors('Authorization rejected!')
				->with('msg-type','danger');
		}

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

			return Redirect::route('cms.articles.index')
				->with('msg', 'Article has been deleted')
				->with('msg-type','success');
		}
	}
}