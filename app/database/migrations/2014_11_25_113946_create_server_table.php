<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('server', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('ip', 16);
            $table->string('key', 32);
            $table->string('timestamp', 16);
            $table->string('status', 2);
        });

        DB::table('server')->insert([
            'name' => 'Default',
            'ip' => '192.81.133.58',
            'key' => md5('time-machine-default-server'),
            'timestamp' => time(),
            'status' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('server');
    }

}
