<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            //$table->string('gender')->default('male');
            $table->enum('gender',['male', 'female']);	
            $table->bigInteger('phone')->nullable();
            $table->string('designation')->nullable();
            $table->integer('role_id')->default('1');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_image')->default('assets/images/sm/avatar1.jpg');             
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
