<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('Currency'))
       {
           Schema::create('Currency', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->json('name');
               $table->json('unit');
               $table->timestamps();
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
        Schema::dropIfExists('Currency');
    }
}
