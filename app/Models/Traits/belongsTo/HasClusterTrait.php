<?php namespace App\Models\Traits\belongsTo;

trait HasClusterTrait 
{

	/**
	 * boot
	 *
	 * @return void
	 * @author 
	 **/

	function HasClusterTraitConstructor()
	{
		//
	}

	public function Cluster()
	{
		return $this->belongsTo('App\Models\Cluster');
	}

	public function Category()
	{
		return $this->belongsTo('App\Models\Category', 'cluster_id');
	}

	public function Tag()
	{
		return $this->belongsTo('App\Models\Tag', 'cluster_id');
	}

	public function scopeHasCluster($query, $variable)
	{
		return $query->whereHas('cluster', function($q)use($variable){$q;});
	}

	public function scopeClusterID($query, $variable)
	{
		return $query->where('cluster_id', $variable);
	}
}