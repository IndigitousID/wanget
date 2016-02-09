<?php

namespace App\Models;

use App\Models\Observers\ArticleObserver;

use App\Models\Traits\HasSlugTrait;
use App\Models\Traits\HasTitleTrait;

use Carbon\Carbon;

class Article extends BaseModel
{
	/* ---------------------------------------------------------------------------- RELATIONSHIP TRAITS ---------------------------------------------------------------------*/
	use \App\Models\Traits\belongsTo\HasUserTrait;
	use \App\Models\Traits\belongsToMany\HasClustersTrait;
	use \App\Models\Traits\hasMany\HasStatUserViewsTrait;
	use \App\Models\Traits\hasMany\HasCommentsTrait;

	/* ---------------------------------------------------------------------------- GLOBAL SCOPE TRAITS ---------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- GLOBAL PLUG SCOPE TRAITS ---------------------------------------------------------------------*/
	use HasSlugTrait;
	use HasTitleTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'articles';

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
	protected $dates				=	['created_at', 'updated_at', 'deleted_at', 'published_at'];

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
											'title'							,
											'slug'							,
											'content'						,
											'summary'						,
											'published_at'					,
											'thumbnail'						,
										];
										
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'title'							=> 'max:255',
											'slug'							=> 'max:255',
											'published_at'					=> 'date_format:"Y-m-d H:i:s"'
										];
	
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
		
	public static function boot() 
	{
        parent::boot();
 
        Article::observe(new ArticleObserver());
    }

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope to get condition where published
	 *
	 * @param string or array of published
	 **/
	public function scopePublished($query, $variable)
	{
		return 	$query->where('published_at', '<=', Carbon::now()->format('Y-m-d H:i:s'));
	}

}
