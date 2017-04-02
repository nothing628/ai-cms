<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activitys', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('activity_model_id')->unsigned();
			$table->string('activity_model_type');
			$table->bigInteger('user_id')->unsigned();
			$table->string('activity_type', 20); //comment, bookmark, reading
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activitys');
	}
}
