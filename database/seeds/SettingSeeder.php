<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('settings')->insert([
			'key' => 'additional.script',
			'value' => '']);

		DB::table('settings')->insert([
			'key' => 'app.name',
			'value' => 'MangaTitan']);
	}
}
