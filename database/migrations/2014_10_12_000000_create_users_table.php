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
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('state')->nullable();
            $table->integer('phone')->nullable();
            $table->string('school')->nullable();
            $table->integer('grad_year')->nullable();
            $table->string('degree')->nullable();
            $table->string('current_job')->nullable();
            $table->string('desired_job')->nullable();
            $table->string('working_exp')->nullable();
            $table->string('verifyToken')->nullable();
            $table->string('image')->default('default.png');
            $table->string('resume')->nullable();
            $table->boolean('status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
