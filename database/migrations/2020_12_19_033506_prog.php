<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('use' , function($my){
      $my->increments('id');
      $my->string('name');
      $my->string('age');
             $my->string('hh');
  });

        Schema::create('uses' , function($my){
            $my->increments('id');
            $my->string('name');
            $my->string('age');
            $my->string('hh');
        });

        Schema::create('programmers' , function($my){
            $my->increments('id');
            $my->string('name');
            $my->string('age');
            $my->string('hh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('	programmers');
        Schema::drop('	use');
        Schema::drop('	uses');
    }
}
