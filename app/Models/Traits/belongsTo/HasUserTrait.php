<?php namespace App\Models\Traits\belongsTo;

trait HasUserTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author 
	 **/

	function HasUserTraitConstructor()
	{
		//
	}

	public function User()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function scopeHasUser($query, $variable)
	{
		return $query->whereHas('user', function($q)use($variable){$q;});
	}

	public function scopeUserID($query, $variable)
	{
		return $query->where('user_id', $variable);
	}

	/**
	 * check if model has user in certain name
	 *
	 * @var array or singular name
	 **/
	public function scopeUserName($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->whereHas('user', function($q)use($value){$q->name($value);});
			}

			return $query;
		}

		return $query->whereHas('user', function($q)use($variable){$q->name($variable);});
	}

}