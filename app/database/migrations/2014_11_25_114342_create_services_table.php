<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('services', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('uid', 16);
            $table->string('sid', 16);
            $table->string('type', 16);
            $table->longText('data');
            $table->string('stime', 16);
            $table->string('etime', 16);
            $table->string('status', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('services');
    }

}
