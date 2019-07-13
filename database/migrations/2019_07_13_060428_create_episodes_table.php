<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('video')->nullable();
            $table->string('picture')->nullable();
            $table->string('download')->nullable();
            $table->string('material')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('section_id');
            $table->timestamps();
            $table->softDeletes();

            //relationships
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('section_id')->references('id')->on('sections');

             //others
            $table->charset = 'utf8';   
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
