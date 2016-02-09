<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();

		$penname 			= ['OctoCat', 'INOD', 'Helen', 'Yo', 'Rose', 'Meks', 'Ace', 'End'];
		$mail 				= ['OctoCat@onegate.id', 'INOD@onegate.id', 'Helen@onegate.id', 'Yo@onegate.id', 'Rose@onegate.id', 'Meks@onegate.id', 'Ace@onegate.id', 'End@onegate.id'];
		$role 				= ['developer', 'strategist', 'writer', 'strategist', 'writer', 'writer', 'strategist', 'strategist'];
		
		foreach ($penname as $key => $value) 
		{
			$admin				= new \App\Models\Admin;

			$admin->fill([
					'name'		=> $value,
					'avatar'	=> '/images/avatar/'.strtolower($value).'.png',
					'email'		=> $mail[$key],
					'password'	=> bcrypt('admin'),
					'role'		=> $role[$key],
					'is_acitve'	=> true,
				]);

			if(!$admin->save())
			{
				dd($admin->getError());
			}
		}
	}
}
