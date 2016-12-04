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
        Schema::create('chapters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('manga_id')->unsigned();
            $table->string('chapter_title')->nullable();
            $table->integer('chapter_num')->unsigned();
            $table->integer('views')->unsigned()->default(0);
            $table->timestamp('release_at')->nullable();
            $table->timestamps();

            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('CASCADE')->onUpdate('CASCADE');
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
    		$table->dropForeign('chapters_manga_id_foreign');
    	});
    	
        Schema::dropIfExists('chapters');
    }
}
