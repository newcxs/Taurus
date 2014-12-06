<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email', 128);
            $table->string('password');
            $table->string('qq', 16);
            $table->string('emailverify', 1);
            $table->string('regtime', 16);
            $table->string('regip', 16);
            $table->string('logintime', 16);
            $table->string('loginip', 16);
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('users');
    }

}
