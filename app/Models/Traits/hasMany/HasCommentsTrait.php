<?php namespace App\Models\Traits\hasMany;

trait HasCommentsTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author cmooy
	 **/
	function HasCommentsTraitConstructor()
	{
		//
	}

	public function Comments()
	{
		return $this->hasMany('App\Models\Comment');
	}

	public function scopeHasComments($query, $variable)
	{
		return $query->whereHas('comments', function($q)use($variable){$q;});
	}

	public function scopeCommentID($query, $variable)
	{
		return $query->whereHas('comments', function($q)use($variable){$q->id($variable);});
	}
}