<?php

namespace App\Models;

use App\Models\Observers\ClusterObserver;

use App\Models\Traits\HasTypeTrait;
use App\Models\Traits\HasNameTrait;
use App\Models\Traits\HasSlugTrait;

/**
* Model for user
* 
* @author cmooy
*/
class Cluster extends BaseModel
{
	/* ---------------------------------------------------------------------------- RELATIONSHIP TRAITS ---------------------------------------------------------------------*/
	use \App\Models\Traits\belongsTo\HasClusterTrait;
	use \App\Models\Traits\belongsToMany\HasArticlesTrait;
	
	/* ---------------------------------------------------------------------------- GLOBAL SCOPE TRAITS ---------------------------------------------------------------------*/
	use HasTypeTrait;

	/* ---------------------------------------------------------------------------- GLOBAL PLUG SCOPE TRAITS ---------------------------------------------------------------------*/
	use HasNameTrait;
	use HasSlugTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'clusters';

	/**
	 * Timestamp field
	 *
	 * @var array
	 */
	// protected $timestamps			= true;

	/**
	 * Returned as carbon
	 *
	 * @var array
	 */
	protected $dates				=	['created_at', 'updated_at', 'deleted_at'];

	/**
	 * The appends attributes from mutator and accessor
	 *
	 * @var array
	 */
	protected $appends				=	[];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden 				= [];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
	
	public static function boot() 
	{
        parent::boot();
 
        Cluster::observe(new ClusterObserver());
    }

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
