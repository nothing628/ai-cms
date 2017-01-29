<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggableTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagging_tagged', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('taggable_id')->unsigned()->index();
			$table->string('taggable_type', 255)->index();
			$table->string('tag_name', 255);
			$table->string('tag_slug', 255)->index();
		});

		Schema::create('tagging_tag_groups', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug', 255)->index();
			$table->string('name', 255);
		});

		Schema::create('tagging_tags', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tag_group_id')->unsigned()->nullable();
			$table->string('slug', 255)->index();
			$table->string('name', 255);
			$table->boolean('suggest')->default(false);
			$table->integer('count')->unsigned()->default(0); // count of how many times this tag was used
		});

		Schema::table('tagging_tags', function ($table) {
			$table->foreign('tag_group_id')->references('id')->on('tagging_tag_groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagging_tags');
		Schema::drop('tagging_tag_groups');
		Schema::drop('tagging_tagged');
	}
}
