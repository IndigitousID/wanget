<?php namespace App\Models\Observers;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\ArticleCluster;

/**
 * Used in Article model
 *
 * @author cmooy
 */
class ArticleObserver 
{
	/** 
	 * observe Article event saving
	 * 1. check unique slug
	 * 2. act, accept or refuse
	 * 
	 * @param $model
	 * @return bool
	 */
	public function saving($model)
	{
		$errors 						= new MessageBag();

		//1. Check unique Slug
		$model->slug            		= Str::slug($model->title);

		$slug                           = Article::slug($model->slug)->notid($model->id)->first();

		if(!is_null($slug))
		{
			$errors->add('slug', 'Artikel sudah ada.');
		}
		
		if($errors->count())
		{
			$model['errors'] 		= $errors;

			return false;
		}

		return true;
	}

	/** 
	 * observe Article event deleting
	 * 1. delete category(and tag)
	 * 2. act, accept or refuse
	 * 
	 * @param $model
	 * @return bool
	 */
	public function deleting($model)
	{
		$errors						= new MessageBag();

		//1. delete Article's clusters
		$clusters					= ArticleCluster::where('article_id', $model->id)->get();

		foreach ($clusters as $cluster) 
		{
			if(!$cluster->delete())
			{
				$errors->add('cluster', $cluster->getError());
			}                     
		}

		if($errors->count())
		{
			$model['errors']		= $errors;

			return false;
		}

		return true;
	}
}
