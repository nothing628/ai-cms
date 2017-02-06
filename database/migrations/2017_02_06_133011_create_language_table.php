<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('languages', function (Blueprint $table) {
			$table->string('id', 2)->primary();
			$table->string('lang', 20);
			$table->timestamps();
		});

		Schema::table('mangas', function (Blueprint $table) {
			$table->string('lang_id', 2)->default('en');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mangas', function (Blueprint $table) {
			$table->dropColumn('lang_id');
		});

		Schema::drop('languages');
	}
}
