<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = new User;
		$user->username = 'admin';
		$user->email = 'admin@admin.com';
		$user->fullname = 'Administrator';
		$user->password = bcrypt('admin');
		$user->api_token = '11111';
		$user->is_admin = true;
		$user->save();

		$user = new User;
		$user->username = 'user';
		$user->email = 'user@user.com';
		$user->fullname = 'User test';
		$user->password = bcrypt('user');
		$user->api_token = '11112';
		$user->is_admin = false;
		$user->save();
	}
}
