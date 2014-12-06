<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('setting', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->string('key');
            $table->string('value');
            $table->primary('key');
        });

        DB::table('setting')->insert(['key' => 'sitename', 'value' => 'Time Machine']);
        DB::table('setting')->insert(['key' => 'siteurl', 'value' => 'http://www.time-machine.tk']);
        DB::table('setting')->insert(['key' => 'keywords', 'value' => 'TimeMachine,GFW,Wall,SS,VPN']);
        DB::table('setting')->insert(['key' => 'description', 'value' => 'Time Machine']);
        DB::table('setting')->insert(['key' => 'emailverify', 'value' => '0']);
        DB::table('setting')->insert(['key' => 'emailauth', 'value' => '']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('setting');
    }

}
