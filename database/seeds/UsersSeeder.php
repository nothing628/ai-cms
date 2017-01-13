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
        	'username' => 'Administrator',
        	'email'    => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        	'is_admin' => true ]);

        DB::table('users')->insert([
        	'username' => 'User1',
        	'email'    => 'user@user.com',
        	'password' => bcrypt('user'),
        	'is_admin' => false ]);
    }
}
