<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('manga_id')->unsigned();
            $table->integer('order')->unsigned();
            $table->string('title')->nullable();
            $table->timestamp('release_date')->nullable();
            $table->timestamps();

            $table->foreign('manga_id')->references('id')->on('manga')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter');
    }
}
