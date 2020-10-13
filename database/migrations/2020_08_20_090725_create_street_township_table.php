<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetTownshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Street_Township'))
        {
            Schema::create('Street_Township', function (Blueprint $table) {
                $table->id();
                $table->integer('street_id');
                $table->integer('township_id');
                $table->timestamps();
                $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('Street_Township');
    }
}
