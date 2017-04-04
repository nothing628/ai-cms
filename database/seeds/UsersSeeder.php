<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'username' => 'admin123',
			'email'    => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'api_token' => '11111',
			'is_admin' => true ]);

		DB::table('users')->insert([
			'username' => 'user123',
			'email'    => 'user@user.com',
			'password' => bcrypt('user'),
			'api_token' => '11112',
			'is_admin' => false ]);
	}
}
