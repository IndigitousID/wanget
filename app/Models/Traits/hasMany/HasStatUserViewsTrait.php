<?php namespace App\Models\Traits\hasMany;

trait HasStatUserViewsTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author cmooy
	 **/
	function HasStatUserViewsTraitConstructor()
	{
		//
	}

	/* ------------------------------------------------------------------- RELATIONSHIP TO SERVICE -------------------------------------------------------------------*/

	public function StatUserViews()
	{
		return $this->hasMany('App\Models\StatUserView', 'statable_id')->where('statable_type', get_class($this));
	}

	public function scopeHasStatUserViews($query, $variable)
	{
		return $query->whereHas('statuserviews', function($q)use($variable){$q;});
	}

	public function scopeStatUserViewID($query, $variable)
	{
		return $query->whereHas('statuserviews', function($q)use($variable){$q->id($variable);});
	}
}