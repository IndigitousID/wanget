<?php namespace App\Models\Traits\hasMany;

trait HasArticlesTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author cmooy
	 **/
	function HasArticlesTraitConstructor()
	{
		//
	}

	/* ------------------------------------------------------------------- RELATIONSHIP TO SERVICE -------------------------------------------------------------------*/

	public function Articles()
	{
		return $this->hasMany('App\Models\Article');
	}

	public function scopeHasArticles($query, $variable)
	{
		return $query->whereHas('articles', function($q)use($variable){$q;});
	}

	public function scopeArticleID($query, $variable)
	{
		return $query->whereHas('articles', function($q)use($variable){$q->id($variable);});
	}
}