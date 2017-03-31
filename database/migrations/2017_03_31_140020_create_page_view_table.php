<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageViewTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('track_views', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->date('view_date');
			$table->timestamps();
		});

		Schema::create('track_details', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('track_views_id')->unsigned()->index();
			$table->bigInteger('track_browsers_id')->unsigned()->index();
			$table->bigInteger('track_os_id')->unsigned()->index();
			$table->bigInteger('views')->unsigned();
			$table->timestamps();
		});

		Schema::create('track_browsers', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('browser', 50);
			$table->string('version', 20)->nullable();
			$table->boolean('is_mobile')->default(false);
			$table->timestamps();
		});

		Schema::create('track_os', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('os_name', 50);
			$table->string('os_version', 20)->nullable();
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
		Schema::drop('track_os');
		Schema::drop('track_browsers');
		Schema::drop('track_details');
		Schema::drop('track_views');
	}
}
