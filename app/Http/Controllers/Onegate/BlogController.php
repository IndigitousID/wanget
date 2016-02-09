<?php namespace App\Http\Controllers\Onegate;

use App\Http\Controllers\Controller;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

use App\Models\Article;
use App\Events\ArticleSearched;

class BlogController extends Controller 
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
		$filters 						= [];

		if(Input::has('q'))
		{
			$filters['title']			= Input::get('q');
		}
		
		if(Input::has('author'))
		{
			$filters['username']		= Input::get('author');
		}

		if(Input::has('category'))
		{
			$filters['categoriesslug']	= Input::get('category');
			$data['slug']				= Input::get('category');
			$data['type']				= 'category';
		}

		if(Input::has('tag'))
		{
			$filters['tagsslug']		= Input::get('tag');
			$data['slug']				= Input::get('tag');
			$data['type']				= 'tag';
		}

		if(isset($data))
		{
			event(new ArticleSearched($data));
			unset($data);
		}

		return view('onegate.blog.index', compact('filters'));
	}

	public function show($slug = null)
	{
		$article						= Article::slug($slug)->published('now')->first();

		if(!$article)
		{
			\App::abort(404);
		}

		$data['slug']					= $slug;
		$data['type']					= 'article';

		event(new ArticleSearched($data));

		return view('onegate.blog.show', compact('article'));
	}

}