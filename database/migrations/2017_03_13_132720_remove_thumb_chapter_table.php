<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveThumbChapterTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chapters', function (Blueprint $table) {
			$table->dropColumn('cover');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chapters', function (Blueprint $table) {
			$table->string('cover', 255)->nullable()->after('chapter_num');
		});
	}
}
