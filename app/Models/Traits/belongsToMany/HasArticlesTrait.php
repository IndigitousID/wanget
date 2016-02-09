<?php namespace App\Models\Traits\belongsToMany;

trait HasArticlesTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author 
	 **/

	function HasArticlesTraitConstructor()
	{
		//
	}

	/* ------------------------------------------------------------------- RELATIONSHIP TO Article -------------------------------------------------------------------*/

	public function Articles()
	{
		return $this->belongsToMany('App\Models\Article', 'articles_clusters', 'cluster_id');
	}

	public function scopeArticlesID($query, $variable)
	{
		return $query->whereHas('tags', function($q)use($variable){$q->id($variable);});
	}
}