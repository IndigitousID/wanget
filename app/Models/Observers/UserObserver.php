<?php namespace App\Models\Observers;

use Illuminate\Support\MessageBag;
use Hash;

use App\Models\User;

/**
 * Used in User, Guest, Admin Model
 *
 * @author cmooy
 */
class UserObserver 
{
	/** 
	 * observe user event saving
	 * 1. Check email
	 * 2. Check rehash password
	 * 3. act, accept or refuse
	 * 
	 * @param $model
	 * @return bool
	 */
	public function saving($model)
	{
		$errors                             = new MessageBag();

		if(is_null($model->id))
		{
			$id                             = 0;
		}
		else
		{
			$id                             = $model->id;
		}

		//1. Check email
		$user                               = User::email($model->email)->notid($id)->first();

		if($user)
		{
			$errors->add('User', 'Email sudah terdaftar.');
		}

		//2. Check rehash password
		if (Hash::needsRehash($model->password))
		{
			$model->password                = bcrypt($model->password);
		}

		if($errors->count())
		{
			$model['errors']                = $errors;

			return false;
		}

		return true;
	}
}
