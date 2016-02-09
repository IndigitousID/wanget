<?php namespace App\Models\Traits;

/**
 * available function to get name of records
 *
 * @author cmooy
 */
trait HasTitleTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 **/
	function HasTitleTraitConstructor()
	{
		//
	}

	/**
	 * scope to get condition where Title
	 *
	 * @param string or array of Title
	 **/
	public function scopeTitle($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->where($query->getModel()->table.'.title', 'like', '%'.$value.'%');
			}

			return $query;
		}
		return 	$query->where($query->getModel()->table.'.title', 'like', '%'.$variable.'%');
	}
}