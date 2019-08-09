<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
           // $table->bigInteger('course_id')->nullable();
            $table->unsignedBigInteger('episode_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            //relationships
           // $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('episode_id')->references('id')->on('episodes');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('reactions');
    }
}
