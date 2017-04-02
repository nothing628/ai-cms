<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarkTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookmarks', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('manga_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->tinyInteger('status')->unsigned()->default(0); // 0 plan to read, 1 reading, 2 complete
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bookmarks');
	}
}
