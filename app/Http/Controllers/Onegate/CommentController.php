<?php namespace App\Http\Controllers\Onegate;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\User;
use App\Models\Guest;
use App\Models\Article;

use Input, DB, Redirect, Auth, Carbon\Carbon;

use Illuminate\Support\MessageBag;

class CommentController extends Controller 
{
	/**
	 * Instantiate a new Comment Controller instance.
	 */
	
	public function __construct()
	{
		// $this->middleware('passwordneeded', ['only' => ['destroy']]);

		// parent::__construct();
	}

	public function store($slug = null, $id = null)
	{
		$email 						= Input::get('email');
		$name 						= Input::get('name');

		$user 						= User::email($email)->first();
		
		$article 					= Article::slug($slug)->published('now')->first();

		if(!$article)
		{
			\App::abort(404);
		}

		if(!$user)
		{
			$user 					= new Guest;
			$user->fill([
					'name'			=> $name,
					'role'			=> 'guest',
					'email'			=> $email,
				]);

			if(!$user->save())
			{
				\App::abort(404);
			}
		}

		$comment 					= Comment::findornew($id);

		$comment->fill([
				'user_id'			=> $user['id'],
				'article_id'		=> $article['id'],
				'content'			=> Input::get('message'),
			]);

		if(!$comment->save())
		{
			\App::abort(404);
		}

		return Redirect::route('onegate.blogs.show', $slug);
	}
}