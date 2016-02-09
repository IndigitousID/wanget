<?php namespace App\Models\Traits\morphTo;

/**
 * Trait for models morph to Stat.
 *
 * @author cmooy
 */
trait HasStatableTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 **/
	function HasStatableTraitConstructor()
	{
		//
	}

	/**
	 * define morph to as Statable
	 *
	 **/
	public function Statable()
	{
		return $this->morphTo();
	}

	/**
	 * find Statable id
	 *
	 **/
	public function scopeStatableID($query, $variable)
	{
		return $query->where('statable_id', $variable);
	}

	/**
	 * find Statable type
	 *
	 **/
	public function scopeStatableType($query, $variable)
	{
		if(is_array($variable))
		{
			return $query->whereIn('statable_type', $variable);
		}

		return $query->where('statable_type', $variable);
	}

	/**
	 * check article
	 *
	 **/
	public function scopeAuthorofArticle($query, $variable)
	{
		return $query->selectraw('users.name as author')
					->statabletype('App\Models\Article')
					->join('articles', function ($join) use($variable) 
					 {
						$join->on ( 'stat_user_views.statable_id', '=', 'articles.id' )
						->wherenull('articles.deleted_at')
						;
					})
					->join('users', function ($join) use($variable) 
					 {
						$join->on ( 'articles.user_id', '=', 'users.id' )
						->wherenull('users.deleted_at')
						;
					})
					->groupby('articles.user_id')
					;
	}
}