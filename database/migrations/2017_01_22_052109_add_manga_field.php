<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMangaField extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mangas', function (Blueprint $table) {
			$table->bigInteger('category_id')->unsigned()->after('user_id');
			$table->boolean('is_completed')->default(true)->after('views');
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
			$table->dropColumn('is_completed');
			$table->dropColumn('category_id');
		});
	}
}
