<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('chapter_id')->unsigned();
			$table->integer('page_num')->unsigned();
			$table->string('path', 255);
			$table->timestamps();

			$table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pages', function (Blueprint $table) {
			$table->dropForeign('pages_chapter_id_foreign');
		});

		Schema::dropIfExists('pages');
	}
}
