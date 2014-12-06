<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpnusersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('vpnusers', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('account', 32);
            $table->string('pwd', 32);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('vpnusers');
    }

}
