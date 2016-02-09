<?php namespace App\Models\Traits\belongsTo;

trait HasArticleTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author 
	 **/

	function HasArticleTraitConstructor()
	{
		//
	}

	public function Article()
	{
		return $this->belongsTo('App\Models\Article');
	}

	public function scopeHasArticle($query, $variable)
	{
		return $query->whereHas('article', function($q)use($variable){$q;});
	}

	public function scopeArticleID($query, $variable)
	{
		return $query->where('articleid', $variable);
	}
}