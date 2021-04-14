<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_stories', function (Blueprint $table) {
            $table->id();
            $table->LONGTEXT('content');
            $table->unsignedBigInteger('postId');
            $table->tinyInteger('schoolId');
            $table->tinyInteger('lessonId');
            $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('class_stories');
    }
}
