<?php namespace App\Models\Traits\belongsToMany;

trait HasClustersTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author 
	 **/

	function HasClustersTraitConstructor()
	{
		//
	}

	/* ------------------------------------------------------------------- RELATIONSHIP TO CLUSTER -------------------------------------------------------------------*/

	public function Clusters()
	{
		return $this->belongsToMany('App\Models\Cluster', 'articles_clusters', 'article_id', 'cluster_id');
	}

	public function Categories()
	{
		return $this->belongsToMany('App\Models\Category', 'articles_clusters', 'article_id', 'cluster_id');
	}

	public function scopeCategoriesID($query, $variable)
	{
		return $query->whereHas('categories', function($q)use($variable){$q->id($variable);});
	}
	
	/**
	 * check if model has category in certain slug
	 *
	 * @var array or singular slug
	 **/
	public function scopeCategoriesSlug($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->whereHas('categories', function($q)use($value){$q->slug($value);});
			}

			return $query;
		}

		return $query->whereHas('categories', function($q)use($variable){$q->slug($variable);});
	}

	public function Tags()
	{
		return $this->belongsToMany('App\Models\Tag', 'articles_clusters', 'article_id', 'cluster_id');
	}

	public function scopeTagsID($query, $variable)
	{
		return $query->whereHas('tags', function($q)use($variable){$q->id($variable);});
	}

	/**
	 * check if model has tag in certain slug
	 *
	 * @var array or singular slug
	 **/
	public function scopeTagsSlug($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->whereHas('tags', function($q)use($value){$q->slug($value);});
			}

			return $query;
		}

		return $query->whereHas('tags', function($q)use($variable){$q->slug($variable);});
	}
}