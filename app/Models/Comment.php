<?php

namespace App\Models;

// use App\Models\Observers\CommentObserver;

class Comment extends BaseModel
{
	/* ---------------------------------------------------------------------------- RELATIONSHIP TRAITS ---------------------------------------------------------------------*/
	use \App\Models\Traits\belongsTo\HasUserTrait;
	use \App\Models\Traits\belongsTo\HasArticleTrait;

	/* ---------------------------------------------------------------------------- GLOBAL SCOPE TRAITS ---------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- GLOBAL PLUG SCOPE TRAITS ---------------------------------------------------------------------*/

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'comments';

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

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'user_id'						,
											'article_id'					,
											'content'						,
										];
										
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
										];
	
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
		
	public static function boot() 
	{
        parent::boot();
 
        // Comment::observe(new CommentObserver());
    }

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope to find exact date
	 *
	 * @param string of history
	 */
	public  function scopeOndate($query, $variable)
	{
		if(!is_array($variable))
		{
			return $query->where('created_at', '=', date('Y-m-d H:i:s', strtotime($variable)))->orderBy('created_at', 'desc');
		}

		return $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($variable[0])))->where('created_at', '<=', date('Y-m-d H:i:s', strtotime($variable[1])))->orderBy('created_at', 'asc');
	}
}
