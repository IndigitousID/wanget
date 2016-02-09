<?php

namespace App\Models;

use App\Models\Traits\HasTypeTrait;
use App\Models\Traits\HasNameTrait;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
* Model for user
* 
* @author cmooy
*/
class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract 
{
    use Authenticatable, CanResetPassword;

	/* ---------------------------------------------------------------------------- RELATIONSHIP TRAITS ---------------------------------------------------------------------*/
	use \App\Models\Traits\hasMany\HasArticlesTrait;
	use \App\Models\Traits\hasMany\HasCommentsTrait;
	use \App\Models\Traits\hasMany\HasStatUserViewsTrait;

	/* ---------------------------------------------------------------------------- GLOBAL SCOPE TRAITS ---------------------------------------------------------------------*/
	use HasTypeTrait;

	/* ---------------------------------------------------------------------------- GLOBAL PLUG SCOPE TRAITS ---------------------------------------------------------------------*/
	use HasNameTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'users';

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
	protected $dates				=	['created_at', 'updated_at', 'deleted_at', 'last_logged_at'];

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
	protected $hidden 				= ['password', 'remember_token'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'last_logged_at'				,
										];


	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
	
	public static function boot() 
	{
        parent::boot();
 
        // User::observe(new UserObserver());
    }

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
	
	/**
	 * scope to get condition where Email
	 *
	 * @param string or array of Email
	 **/
	public function scopeEmail($query, $variable)
	{
		if(is_array($variable))
		{
			foreach ($variable as $key => $value) 
			{
				$query = $query->where($query->getModel()->table.'.email', $value);
			}

			return $query;
		}
		return 	$query->where($query->getModel()->table.'.email', $variable);
	}

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
