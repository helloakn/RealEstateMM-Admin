<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('Login_History'))
       {
           Schema::create('Login_History', function (Blueprint $table) {
               $table->id();
               $table->integer('user_id');
               $table->text('device');
               $table->text('ip');
               $table->json('payload');
               $table->dateTime('from_time');
               $table->dateTime('to_time');
           });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Login_History');
    }
}
