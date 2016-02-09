<?php

namespace App\Listeners;

use App\Events\ArticleSearched;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

/**
 * Listener for Article Viewed
 * 
 * @author cmooy
 */
class StatArticleViewed
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * 1. check stat type
	 * 2. check every item searched (slug)
	 * 3. check stat
	 * 4. if there were no error save
	 *
	 * @param  ArticleSearched  $event
	 * @return void
	 */
	public function handle(ArticleSearched $event)
	{
		// Access the stat using $event->stat...
		//1. check stat type
		if($event->stat['type']=='category')
		{
			$data                   = new \App\Models\Category;
		}
		elseif($event->stat['type']=='tag')
		{
			$data                   = new \App\Models\Tag;
		}
		elseif($event->stat['type']=='article')
		{
			$data                   = new \App\Models\Article;
		}

		//2. check every item searched
		$checkslug                          = [];
		if(is_array($event->stat['slug']))
		{
			foreach ($event->stat['slug'] as $key => $value) 
			{
				$check                      = $this->checkslug($data, $value);
				if($check)
				{
					$checkslug[$value]      = $check;
				}
			}
		}
		else
		{
			$check                                  = $this->checkslug($data, $event->stat['slug']);
			if($check)
			{
				$checkslug[$event->stat['slug']]    = $check;
			}
		}

		//3. check stat user view
		if(isset($event->stat['user_id']))
		{
			$userid                     = $event->stat['user_id'];
		}
		else
		{
			$userid                     = 0;
		}

		foreach ($checkslug as $key => $value) 
		{
			$statuser                   = \App\Models\StatUserView::userid($userid)->statableid($value['id'])->statabletype(get_class($data))->ondate('now')->first();

			 //4. if there were no error save
			if($statuser)
			{
				$statuser->view         = $statuser->view + 1;
				$statuser->ondate		= $statuser->ondate->format('Y-m-d H:i:s');

				$statuser->save();
			} 
			else
			{
				$statuser               = new \App\Models\StatUserView;

				$statuser->fill(['user_id' => $userid, 'statable_id' => $value['id'], 'statable_type' => get_class($data), 'view' => 1, 'ondate' => Carbon::now()->format('Y-m-d H:i:s')]);
				
				$statuser->save();
			}
		}

		return true;
	}

	/**
	 * Check stat slug.
	 *
	 * @param $model (of data), $slug
	 * @return false or variable
	 */
	public function CheckSlug($data, $slug)
	{
		return $data->slug($slug)->first();
	}
}