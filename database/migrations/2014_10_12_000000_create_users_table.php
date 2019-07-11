<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('picture', 150);
            $table->string('phone', 150);
            $table->string('email')->unique();
            $table->unsignedBigInteger('role_id')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //cashier columns
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('trial_ends_at')->nullable();


            $table->rememberToken();
            $table->timestamps();

            //relationships
            $table->foreign('role_id')->references('id')->on('roles');

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
        Schema::dropIfExists('users');
    }
}
