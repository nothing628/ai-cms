<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sources', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('source');
			$table->timestamps();
		});

		Schema::create('indexed_mangas', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('source_id')->unsigned();
			$table->string('title');
			$table->string('url');
			$table->boolean('is_indexed')->default(false);
			$table->boolean('is_missing')->default(false);
			$table->timestamps();
		});

		Schema::create('indexed_chapters', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('manga_id')->unsigned();
			$table->string('chapter')->nullable();
			$table->integer('chapter_num')->unsigned();
			$table->string('url')->nullable();
			$table->boolean('is_indexed')->default(false);
			$table->boolean('is_missing')->default(false);
			$table->timestamps();
		});

		Schema::create('indexed_pages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('chapter_id')->unsigned();
			$table->integer('page_num')->unsigned();
			$table->string('url')->nullable();
			$table->boolean('is_indexed')->default(false);
			$table->boolean('is_missing')->default(false);
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
		Schema::drop('indexed_pages');
		Schema::drop('indexed_chapters');
		Schema::drop('indexed_mangas');
		Schema::drop('sources');
	}
}
