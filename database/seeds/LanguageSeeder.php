<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$language = new Language();
		$language->id = 'en';
		$language->lang = 'English';
		$language->save();

		$language = new Language();
		$language->id = 'jp';
		$language->lang = 'Japan';
		$language->save();
	}
}
