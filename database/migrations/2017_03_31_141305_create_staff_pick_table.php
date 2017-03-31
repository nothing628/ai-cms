<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffPickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_picks', function (Blueprint $table) {
        	$table->bigIncrements('id');
        	$table->bigInteger('manga_id')->unsigned();
        	$table->bigInteger('user_id')->unsigned();
        	$table->integer('order_num')->unsigned();
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
        Schema::dropTable('staff_picks');
    }
}
