<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->string('picture')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            //relationships
             $table->foreign('admin_id')->references('id')->on('administrators');
             $table->foreign('category_id')->references('id')->on('categories');
             $table->foreign('level_id')->references('id')->on('levels');

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
        Schema::dropIfExists('courses');
    }
}
