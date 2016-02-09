<?php namespace App\Models\Traits;

/**
 * available function to get name of records
 *
 * @author cmooy
 */
trait HasSlugTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 **/
	function HasSlugTraitConstructor()
	{
		//
	}

	/**
	 * scope to get condition where Slug
	 *
	 * @param string or array of Slug
	 **/
	public function scopeSlug($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->where($query->getModel()->table.'.slug', $value);
			}

			return $query;
		}
		return 	$query->where($query->getModel()->table.'.slug', $variable);
	}
}